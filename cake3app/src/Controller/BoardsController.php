<?php
namespace App\Controller;

use \Exception;
use \Cake\Log\Log;
use Cake\Datasource\ConnectionManager;
use Cake\Validation\Validator;

class BoardsController extends AppController
{
    public function index($id = null)
    {
        $data = $this->Boards
            ->find('all')
            ->contain(['People']);
        $this->set('data', $data);
    }

    public function addRecord()
    {
        if ($this->request->is('post')) {
            $board = $this->Boards->newEntity($this->request->data);
            $validator = new Validator();
            $validator->email('name');
            $errors = $validator->errors($this->request->data);
            if (!empty($errors)) {
                $this->Flash->error('EMAIL ERROR!!');
            } else {
                if ($this->Boards->save($board)) {
                    $this->redirect(['action' => 'index']);
                }
            }
            $this->set('entity', $board);
        }
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