<?php
namespace App\Controller;

class HelloController extends AppController
{
  public $name = 'Hello';
  public $autoRender = false;
  
  public function index()
  {
    $this->setAction("other"); // フォワード
    // $this->redirect("/hello/other"); // リダイレクト
  }

  public function other()
  {
    echo "これは、index以外の表示です。";
  }
}