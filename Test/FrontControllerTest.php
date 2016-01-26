<?php

require_once '../FrontController.php';

class FrontControllerTest extends PHPUnit_Framework_TestCase {

  private $fc;

  public function setUp() {
    $this->fc = new FrontController();
  }

  public function testLoadConfiguration() {
    $a = $this->fc->getConfig('db');
    $this->assertArrayHasKey('name', $a);
    $this->assertEquals('profile', $a['name']);
  }

  /*
   * @depends testLoadConfiguration
   */
  public function testConnectDBSuccess() {
    $this->assertInstanceOf('PDO', $this->fc->getDb('db'));
  }

  public function testConnectDBShouldReturnNoConfig() {
    $this->assertEquals('No database config defined!', $this->fc->getDb('1'));
  }

}
