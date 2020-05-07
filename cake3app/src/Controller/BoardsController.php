<?php
namespace App\Controller;

class BoardsController extends AppController
{
    public function index()
    {
        $this->set('entity', $this->Boards->newEntity());
        if ($this->request->is('post')) {
            $data = $this->Boards->findById($this->request->data['id']);
        } else {
            $data = $this->Boards->find('all');
        }
        $this->set('data', $data->toArray());
        $this->set('count', $data->count());

        // $data->order(['name' => 'ASC', 'id' => 'DESC']);
        // $this->set('min', $data->min('id'));
        // $this->set('max', $data->max('id'));
        // $this->set('first', $data->first()->toArray());
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