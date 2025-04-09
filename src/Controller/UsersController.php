<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;


class UsersController extends AppController
{

  public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('JWTComponent');
        $this->loadModel('Users');
    }
 

    public function list()
    {
        $this->request->allowMethod(['get']);
        $users = $this->Users->find('all')->contain(['Plans']);
        $this->set(['data' => $users, '_serialize' => 'data']);
    }


  public function login()
  {
      if ($this->request->is('post')) {
          $user = $this->Users->findByEmail($this->request->getData('email'))->first();
          if ($user && password_verify($this->request->getData('password'), $user->password)) {
              $payload = ['sub' => $user->id, 'exp' => time() + 3600];
              $token = $this->JWTComponent->encode($payload);
              return $this->response->withType('application/json')->withStringBody(json_encode(['token' => $token]));
          }
      }

      throw new UnauthorizedException("Invalid credentials");
 }

  public function register($planId = null)
  {
      $user = $this->Users->newEmptyEntity();
  
      if ($this->request->is('post')) {
          $data = $this->request->getData();
          $data['plan_id'] = $planId;
  
          // Handle file upload
          if (!empty($data['profile_picture']['tmp_name'])) {
              $filename = time() . '_' . $data['profile_picture']['name'];
              move_uploaded_file($data['profile_picture']['tmp_name'], WWW_ROOT . 'img' . DS . $filename);
              $data['profile_picture'] = 'img/' . $filename;
          }
  
        
  
          $user = $this->Users->patchEntity($user, $data);
          if ($this->Users->save($user)) {
              $this->Flash->success(__('User registered successfully.'));
              return $this->redirect(['action' => 'login']);
          }
      }
  
      $this->set(compact('user', 'planId'));
  }
 
   public function logout()
    {
      localStorage.removeItem('token');
      return $this->redirect('users/login');
    }


}
