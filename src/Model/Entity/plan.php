<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Plan extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}

?>
