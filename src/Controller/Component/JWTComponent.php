<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTComponent extends Component
{
    private $key = 'ac52bd0612e2ec7465d46d95ea5eefcab1ba4b102aaa41f13c241cf9392cbfe9261c4f82a2f4d4d672580816a62c61be504790be0632869667647436814f59f8d7185a90ccad03e4f4ea5f40d2bfb1444c2bf34cff5a70ad2a65e1bc84d4f9190acfeec1ff737049fecad700644c5dd3c8366804600d204afee2bab2d268b577fb45670db065ea8bde7dcda5fe757c4617d15933aba7334c5425f7f312737e44dc80ac7906c64767f5eae47b0aed2cf67d10ce1d66e0290e840c83fde6002c5a43145bea84e385efffe551901e4cf202ec1c0def83e126d08dd890f36932a49e307bd7843d9fb0083589f17c47d338102465fe7416752c2a817f95847c4c4b41';

    public function encode($payload)
    {
        return JWT::encode($payload, $this->key, 'HS256');
    }

    public function decode($token)
    {
        return JWT::decode($token, new Key($this->key, 'HS256'));
    }
}

?>