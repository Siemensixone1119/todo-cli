<?php
require_once __DIR__ . "/../src/commands/DeleteCommand.php";
require_once __DIR__ . "/../src/commands/AddCommand.php";
require_once __DIR__ . "/TestCase.php";

class DeleteCommandTest extends CommandTestCase
{
  public function testDeleteTask()
  {
    AddCommand([null, "add", "description"]);
    $json = json_decode(file_get_contents($this->path), true);
    $this->assertCount(1, $json["tasks"]);

    DeleteCommand([null, "delete", 1]);
    $json = json_decode(file_get_contents($this->path), true);
    $this->assertCount(0, $json["tasks"]);
  }
}

