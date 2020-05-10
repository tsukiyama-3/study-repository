<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class BoardsTable extends Table
{
    public function initialize($config)
    {
        parent::initialize($config);

        $this->table('books');
    }
}