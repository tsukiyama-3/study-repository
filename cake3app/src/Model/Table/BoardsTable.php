<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

class BoardsTable extends Table
{
    public function validationDefault(Validator $validator)
    {
        $validator->integer('id');
        $validator->notEmpty('name');
        $validator->notEmpty('title');
        $validator->notEmpty('content');
        return $validator;
    }
}