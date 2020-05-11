<?php
namespace App\Controller;

use \Exception;
use \Cake\Log\Log;

class BoardsController extends AppController
{
    public function index($id = null)
    {
        $data = $this->Boards->find();
        if ($this->request->is('post')) {
            $input = $this->request->data['input'];
            $data = $this->Boards->find()->where(['name like' => '%' . $input . '%'])
            ->select(['name', 'title']);
        }
        $this->set('data', $data);
        $this->set('entity', $this->Boards->newEntity());
    }

    public function addRecord()
    {
        if ($this->request->is('post'))
        {
            $board = $this->Boards->newEntity($this->request->data);
            $this->Boards->save($board);
        }
        return $this->redirect(['action' => 'index']);
    }

    public function delRecord()
    {
        if ($this->request->is('post')) {
            $this->Boards->deleteAll(
                ['name'=>$this->request->data['name']]
            );
        }
        $this->redirect(['action' => 'index']);
    }

    public function editRecord()
    {
        if ($this->request->is('post')) {
            $arr1 = ['name' => $this->request->data['name']];
            $arr2 = ['title' => $this->request->data['title']];
            $this->Boards->updateAll($arr2, $arr1);
        }
        return $this->redirect(['action' => 'index']);
    }

}