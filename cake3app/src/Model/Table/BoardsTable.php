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
        $validator
            ->integer('id');
        $validator
            ->notEmpty('name')
            ->minLength('name', 3, '3文字以上入力してください。')
            ->maxLength('name', 20, '20文字以下で入力してください。');
        $validator
            ->notEmpty('title');
        $validator
            ->notEmpty('content');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['name'], '既に登録済みです。'));
        return $rules;
    }
}