<?php
namespace App\Controller;

class HelloController extends AppController
{
  public $name = 'Hello';
  public $autoRender = false;
  
  public function index()
  {
    echo "hello world!";
  }
}