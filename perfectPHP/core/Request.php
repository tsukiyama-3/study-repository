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

  /*
    ベースURLとPATH_INFOの説明
    ベースURL -> URLのホスト部分からフロントコントローラまでの値、このフレームワークでの名前、HTML内リンクで使う
    PATH_INFO -> ベースURLより後の値（GETパラメータは含まない）、RouterクラスがURLとコントローラの紐付けで使う
  */

  // ベースURLを取得するメソッド
  public function getBaseUrl()
  {
    $script_name = $_SERVER['SCRIPT_NAME'];

    $request_uri = $this->getRequestUri();

    // strposは第一引数に指定した文字列から、第二引数に指定した文字列が最初に出現する位置を調べる関数
    if (0 === strpos($request_uri, $script_name)) {
      // フロントコントローラがURLに含まれる場合の処理、
      // SCRIPT_NAMEの値がベースURLと同じになるのでそれを返す
      return $script_name;
    } elseif (0 === strpos($request_uri, dirname($script_name))) {
      // フロントコントローラが省略されている場合の処理
      // rtrim()関数で、右に続く'/'を削除した値を返す
      return rtrim(dirname($script_name), '/');
    }

    return '';
  }

  // PATH_INFOを取得するメソッド
  public function getPathInfo()
  {
    // ベースURLとREQUEST_URIを使用する
    $base_url = $this->getBaseUrl();
    $request_uri = $this->getRequestUri();

    // GETパラメータを取り除く処理
    if (false !== ($pos = strpos($request_uri, '?'))) {
      // strpos()関数は第一引数で指定した文字列のうち、第二引数で指定した位置から第三引数で指定した文字数分取得する関数
      // ここでは'?'より前の部分を抜き出して$request_uriに代入している
      $request_uri = substr($request_uri, 0, $pos);
    }

    // GETパラメータを除いたREQUEST_URIから、ベースURLを除いた値を$path_infoに代入している
    $path_info = (string)substr($request_uri, strlen($base_url));

    return $path_info;
  }

}