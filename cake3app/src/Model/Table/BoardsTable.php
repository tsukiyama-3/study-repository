<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Event\Event;

class BoardsTable extends Table
{
    public function beforeSave(Event $event, EntityInterface $entity, $options)
    {
        $n = $this->find('all', ['conditions' => ['name' => $entity->name]])->count();
        if ($n == 0) {
            return true;
        } else {
            return false;
        }
    }

    public static function defaultConnectionName()
    {
        return 'default2';
    }
}