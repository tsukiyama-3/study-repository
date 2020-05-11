<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Event\Event;

class BoardsTable extends Table
{
    public function beforeFind(Event $event, Query $query)
    {
        $query->order(['name' => 'ASC']);
    }

    public static function defaultConnectionName()
    {
        return 'default2';
    }
}