<?php

class ClassLoader
{
  protected $dirs;
  
  public function registar()
  {
    spl_autoload_register(array($this, 'loadClass'));
  }

  public function registarDir($dir)
  {
    $this->dirs[] = $dir;
  }

  public function loadClass($calss)
  {
    foreach ($this->dirs as $dir) {
      $file = $dir . '/' . $class . '.php';
      if (is_readable($file)) {
        require $file;

        return;
      }
    }
  }

}