<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Event\Event;

class BoardsTable extends Table
{
    public $qdata = null;
    public function beforeFind(Event $event)
    {
        $qstr = '';
        for($i = 0;$i < count($event->data);$i++){
            $query = $event[$i];
            $qstr .= $query->sql() . '<br>\n';
        }
        $this->qdata = $qstr;
        $query = $event->data[0];
        $this->qdata = $query->sql();
    }

    public static function defaultConnectionName()
    {
        return 'default2';
    }
}