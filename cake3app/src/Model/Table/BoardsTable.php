<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class BoardsTable extends Table
{
    public static function defaultConnectionName()
    {
        return 'default2';
    }
}