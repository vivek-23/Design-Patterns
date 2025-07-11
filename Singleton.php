<?php

class DB {
  private static $instance;
  private function __construct(){}
  
  public static function getInstance() {
    if (empty(self::$instance)) {
      self::$instance = new self();
    }
    
    return self::$instance;
  }
}

$o1 = DB::getInstance();
$o1->name = 'Vivek';

$o2 = DB::getInstance();
var_dump($o2);
