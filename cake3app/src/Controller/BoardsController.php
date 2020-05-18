<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

class BoardsController extends AppController
{
    private $people;

    public function initialize()
    {
        parent::initialize();
        $this->people = TableRegistry::get('People');
    }

    public function index()
    {
        $data - $this->Boards
            ->find('all')
            ->order(['Boards.id' => 'DESC'])
            ->contain(['People']);
            $this->set('data', $data);
    }
}