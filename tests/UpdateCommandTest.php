<?php

require_once __DIR__ . "/../src/commands/UpdateCommand.php";
require_once __DIR__ . "/../src/commands/AddCommand.php";
require_once __DIR__ . "/TestCase.php";
require_once __DIR__ . "/../src/helpers/GenerateTime.php";

class UpdateCommandTest extends CommandTestCase
{
  public function testUpdateTask()
  {
    AddCommand([null, "add", "description"]);
    $json = json_decode(file_get_contents($this->path), true);
    $this->assertCount(1, $json["tasks"]);

    UpdateCommand([null, "update", "1", "new description"]);
    $time = GenerateTime();
    $json = json_decode(file_get_contents($this->path), true);
    $this->assertEquals("new description", $json["tasks"][0]["description"]);
    $this->assertEquals($time, $json["tasks"][0]["updatedAt"]);
  }
}
