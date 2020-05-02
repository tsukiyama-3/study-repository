<?php
namespace App\Controller;

class HelloController extends AppController
{
  public function initialize()
  {
    // $name = 'Hello';
    // $autoRender = false;
    // $this->viewBuilder()->autoLayout(true);
    $this->viewBuilder()->layout('Hello');

    $this->set('msg', 'Hello/index');
    $this->set('footer', 'Hello/footer2');
  }
  
  public function index()
  {

    // $this->set('msg', 'ヘッダーエレメント！！');
    // $n = rand(1,2);
    // $this->set('footer', 'Hello/footer' . $n);

    // $this->viewBuilder()->autoLayout(true);
    // $this->autoRender = true;


    // $this->viewBuilder()->autoLayout(false);

    // $this->setAction("other"); // フォワード
    // $this->redirect("/hello/other"); // リダイレクト
  }

  public function sendForm()
  {

    $result = "※送信された情報<br>";
    foreach ($this->request->query as $key => $val) {
        $result .= $key . " => " . $val . "<br>";
    }
    $this->set("result", $result);

    //   $str = $this->request->query['text1'];
    //   $result = "";
    //   if ($str != "") {
    //       $result = "you type: " . $str;
    //   } else {
    //       $result = "empty.";
    //   }
    //   $this->set("result", h($result));
  }

//   public function other()
//   {
//     $this->viewBuilder()->autoLayout(false);
//     $this->autoRender = true;
//   }
}