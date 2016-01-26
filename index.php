<?php
//Initialize database connection
require 'FrontController.php';
$fc = new FrontController();
if($fc->getDb() instanceof PDO){
  echo 'tesd';
}