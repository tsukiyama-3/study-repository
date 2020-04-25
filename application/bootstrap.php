<?php

require 'core/ClassLoader.php';

$loader = new ClassLoader();
$loader->registerDir(dirname(__File__).'/core');
$loader->registerDir(dirname(__File__).'/models');
$loader->register();