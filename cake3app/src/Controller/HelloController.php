<?php
namespace App\Controller;

class HelloController extends AppController
{
  public function initialize()
  {
    $name = 'Hello';
    $autoRender = false;
    $this->viewBuilder()->autoLayout(false);
  }
  
  public function index()
  {
    $this->viewBuilder()->autoLayout(true);
    $this->autoRender = true;


    // $this->viewBuilder()->autoLayout(false);

    // $this->setAction("other"); // フォワード
    // $this->redirect("/hello/other"); // リダイレクト
  }

  public function other()
  {
    $this->viewBuilder()->autoLayout(false);
    $this->autoRender = true;
  }
}