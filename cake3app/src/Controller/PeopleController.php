<?php
namespace App\Controller;

class PeopleController extends AppController
{
    public function index($id = null)
    {
        $data = $this->People
            ->find('all')
            ->contain(['Boards']);
        $this->set('data', $data);
    }
}