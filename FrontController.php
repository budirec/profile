<?php

/*
 * Load configuration
 * Connect to database
 * Solve URL
 * Load Controller
 * Call Controller function
 */

class FrontController {

  private $config;
  private $db;

  public function __construct() {
    $this->config = require_once 'config.php';
  }

  public function getDb($confName = 'db') {
    if ($this->db[$confName]) {
      return $this->db[$confName];
    } else {
      return $this->connectDb($confName);
    }
  }

  public function getConfig($name) {
    return $this->config[$name];
  }

  public function connectDb($name) {
    $config = $this->getConfig($name);
    if (empty($config)) {
      return 'No database config defined!';
    }

    try {
      $db = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['name'], $config['username'], $config['password']);
      $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
      return $db;
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

}
