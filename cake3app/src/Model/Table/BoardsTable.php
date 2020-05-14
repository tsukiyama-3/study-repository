<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

class BoardsTable extends Table
{

    public function initialize(array $config)
    {
        $this->belongsTo('People');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id');
        $validator
            ->notEmpty('name', '必須項目です。');
        $validator
            ->notEmpty('title', '必須項目です。');
        $validator
            ->notEmpty('content', '必須項目です。');
        
        $validator
            ->add('name', 'maxRecords',
            [
                'rule' => ['maxRecords', 'name', 5],
                'message' => __('最大数を超えています。'),
                'provider' => 'table',
            ]);

        return $validator;
    }

    public function maxRecords($data, $field, $num)
    {
        $n = $this->find()
            ->where([$field => $data])
            ->count();
        return $n < $num ? true : false;
    }
}