<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Board extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}