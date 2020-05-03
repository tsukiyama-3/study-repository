<?php
namespace App\Controller;

class BoardsController extends AppController
{
    public function index()
    {
        $data = $this->Boards->find('all');
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

}