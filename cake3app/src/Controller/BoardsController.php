<?php
namespace App\Controller;

class BoardsController extends AppController
{
    public function index()
    {
        $this->set('entity', $this->Boards->newEntity());
        if ($this->request->is('post')) {
            $data = $this->Boards->find('all', [
                'conditions' => ['id' => $this->request->data['id']]
            ]);
        } else {
            $data = $this->Boards->find('all');
        }
        $this->set('data', $data);
    }

    public function addRecord()
    {
        if ($this->request->is('post'))
        {
            $board = $this->Boards->newEntity($this->request->data);
            $this->Boards->save($board);
        }
        // return $this->redirect(['action' => 'index']);
        $this->autoRender = false;
        echo "<pre>";
        pr($this->request->data);
        echo "</pre>";
    }

}