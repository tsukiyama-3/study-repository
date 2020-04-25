<?php

abstract class DbRepository // データベースへのアクセスを行うクラス（抽象クラス）
{
  protected $con;

  public function __construct($con) // DbManagerクラスからPDOクラスのインスタンスを受け取って、それに対してSQL文を実行する。
  {
    $this->setConnection($con);
  }

  public function setConnection($con)
  {
    $this->con = $con;
  }

  public function execute($sql, $params = [])
  {
    $stmt = $this->con->prepare($sql);
    $stmt->execute($params);

    return $stmt;
  }

  public function fetch($sql, $params = [])
  {
    return $this->execute($sql, $params)->fetch(PDO::FETCH_ASSOC);
  }

  public function fetchAll($sql, $params = [])
  {
    return $this->execute($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
  }
}