<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class PlansTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('plans');
        $this->setPrimaryKey('id');
    }

   
}

?>
