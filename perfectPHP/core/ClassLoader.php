<?php

// オートローダークラス

/*
  オートロードとは
    クラスを呼び出した際にそのクラスがPHPに読み込まれてない場合に、
    自動的にファイルの読み込みを行う処理、
  メリット
    require_onceが必要なくなる
  デメリット
    クラスファイルが呼び出せるように、クラスとクラスファイルの関係に
    特定のルールを設けなければならない。
  必要な処理
    ・PHPにオートローダークラスを登録する -> register()メソッド
    ・オートロードが行われた際に、そのクラスファイルを読み込む -> loadClass()メソッド
  対象となるクラスのルール
    ・クラスは「クラス名.php」というファイル名で保存する
    ・クラスはcoreディレクトリおよびmodelsディレクトリに配置する
*/

class ClassLoader
{
  // $dirはロード対象ディレクトリのフルパス
  protected $dirs;
  
  // PHPにオートローダクラスを登録する処理
  public function register()
  {
    // spl_autoload_registerはオートロードの登録をする関数、
    // ここでは自分自身のloadClass()メソッドを指定している。
    spl_autoload_register(array($this, 'loadClass'));
  }

  // オートロードで探すディレクトリを登録できる処理
  public function registerDir($dir)
  {
    //$dirs[]配列に引数の$dirを追加する
    $this->dirs[] = $dir;
  }

  // オートロードが行われた際に、そのクラスを自動で読み込むメソッド
  // 引数のクラス名を元にオートロードを行う
  public function loadClass($class)
  {
    // foreachで$dirの数だけループ処理を行う
    foreach ($this->dirs as $dir) {
      // $fileに読み込みたいファイル名を代入
      $file = $dir . '/' . $class . '.php';
      // is_readable関数はファイルが存在し、読み込み可能かどうかを調べる関数
      if (is_readable($file)) {
        // trueの場合の処理
        // そのファイルを読み込む
        require $file;
        // 読み込んだらreturnで処理を中断する
        return;
      }
    }
  }
}