<?php

class Model {

  /**
   * Database connection
   * 
   * @var PDO 
   */
  private $db;
  protected $table;
  protected $id;
  protected $idName;

  public function __construct($db = NULL) {
    if ($db == NULL) {
      throw new Exception('No database connection supplied.');
    }

    $this->db = $db;
  }

  public function save($data) {
    $sql = 'SELECT COUNT(*) `ct` FROM `' . $this->table . '` WHERE `' . $this->idName . '` = ?';
    $ps = $this->db->prepare($sql);
    $ps->execute([$this->id]);
    try {
      if ($ps->fetch()->ct) {
        //update
      } else {
        //insert
      }
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

}
