<?php

// Requestクラス

/*
  Requestクラスの内容
  ・ユーザーのリクエスト情報を制御するクラス
  機能
  ・HTTPメソッドの判定
  ・$_GET、$_POSTなどの値の取得
  ・リクエストされたURLの取得
  ・サーバーのホスト名やSSLでのアクセスかどうかの判定
*/

class Request
{

  // HTTPメソッドがPOSTかどうかを判定するメソッド
  public function isPost()
  {
    // 'REQUEST_METHOD'にリクエストメソッドが格納されている
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // POSTであればtrueを返す
      return true;
    }
    // それ以外はfalseを返す
    return false;
  }

  // $_GET変数から値を取得するメソッド、第二引数はキーが存在しない場合のデフォルト値
  public function getGet($name, $default = null)
  {
    // 
    if (isset($_GET[$name])) {
      return $_GET[$name];
    }

    return $default;
  }

  // $_POST変数から値を取得するメソッド、第二引数はキーが存在しない場合のデフォルト値
  public function getPost($name, $default = null)
  {
    if (isset($_POST[$name])) {
      return $_POST[$name];
    }

    return $default;
  }

  // サーバーのホスト名を取得するメソッド
  public function getHost()
  {
    // $_SERVER['HTTP_HOST']にはリクエストヘッダのホストの値が格納されている
    if (!empty($_SERVER['HTTP_HOST'])) {
      // $_SERVER['HTTP_HOST']が空じゃなかったらそれを返す
      return $_SERVER['HTTP_HOST'];
    }

    // リクエストヘッダにホストの値が含まれない場合Apach川に設定されたホスト名を返す
    return $_SERVER['SERVER_NAME'];
  }

  // HTTPSでアクセスされたかどうかの判定を行うメソッド
  public function isSsl()
  {
    // HTTPSでアクセスされた場合、$_SERVER['HTTPS']に"on"という文字が含まれるので、それを使って判定する
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
      return true;
    }

    return false;
  }

  // URLの情報が格納されている、$_SERVER['REQUEST_URI']を返すメソッド
  public function getRequestUri()
  {
    return $_SERVER['REQUEST_URI'];
  }

  public function getBaseUrl()
  {
    $script_name = $_SERVER['SCRIPT_NAME'];

    $request_uri = $this->getRequestUri();

    if (0 === strpos($request_uri, $script_name)) {
      return $script_name;
    } elseif (0 === strpos($request_uri, dirname($script_name))) {
      return rtrim(dirname($script_name), '/');
    }

    return '';
  }

  public function getPathInfo()
  {
    $base_url = $this->getBaseUrl();
    $request_uri = $this->getRequestUli();

    if (false !== ($pos = strpos($request_uri, '?'))) {
      $request_uri = substr($request_uri, 0, $pos);
    }

    $path_info = (string)substr($request_uri, strlen($base_url));

    return $path_info;
  }

}