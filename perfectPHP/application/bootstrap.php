<?php

/*
  bootstrap.php 内容
    作成したClassLoaderをオートロードに登録するために作成
    このbootstrqap.phpを読み込むと、オートロードが設定される
*/

// まだClassLoaderクラスは読み込まれていないので、require を使ってファイルを読み込む
require 'core/ClassLoader.php';

// インスタンス作成
$loader = new ClassLoader();
// coreディレクトリとmodelsディレクトリをオートロード対象ディレクトリに設定する処理
$loader->registerDir(dirname(__File__).'/core');
$loader->registerDir(dirname(__File__).'/models');
// registerメソッドでオートロードに登録
$loader->register();