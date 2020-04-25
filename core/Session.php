<?php

class Session
{
  protected static $sessionStarted = false;
  protected static $sessionIdRegenerated = false;

  public function __construct() // セッションの自動スタート
  // __constructor()が実行したタイミングでsession_start()関数を実行している
  {
    if (!self::$sessionStarted) {
      session_start();

      self::$sessionStarted = true;
    }
  }

  public function set($name, $value) // セッションのnameを指定する
  {
    $_SESSION[$name] = $value;
  }

  public function get($name, $default = null)
  {
    if (isset($_SESSION[$name])) { // sessionのnameが指定されていたら、それを返す
      return $_SESSION[$name];
    }
    return $default; // 指定されていなかったらnullを返す
  }

  public function remove($name) // sessionを消去する
  {
    unset($_SESSION[$name]);
  }

  public function clear() // sessionを初期化する
  {
    $_SESSION = array();
  }

  public function regenerate($destroy = true) // セッションのIDを新しく発行するためのメソッド
  // （セッション固定攻撃の脆弱性対策）
  {
    if (!self::$sessionIdRegenerated) {
      session_regenerate_id($destroy);

      self::$sessionIdRegenerated = true;
    }
  }

  // ログイン状態の制御
  public function setAuthenticated($bool)
  {
    $this->set('_authenticated', (bool)$bool);

    $this->regenerate();
  }

  public function isAuthenticated()
  {
    return $this->get('_authenticated', false);
  }
}