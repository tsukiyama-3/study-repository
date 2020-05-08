<?php
namespace App\Controller;

use \Exception;
use \Cake\Log\Log;

class BoardsController extends AppController
{
    public function index()
    {
        $this->set('entity', $this->Boards->newEntity());
        if ($this->request->is('post')) {
            $id = $this->request->data['id'];
            $data = $this->Boards->findByIdOrName($id, $id);
        } else {
            $data = $this->Boards->find('all');
        }
        $this->set('data', $data->toArray());
        $this->set('count', $data->count());
    }

    public function addRecord()
    {
        if ($this->request->is('post'))
        {
            $board = $this->Boards->newEntity($this->request->data);
            $this->Boards->save($board);
        }
        $this->autoRender = false;
        echo "<pre>";
        pr($this->request->data);
        echo "</pre>";
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

}