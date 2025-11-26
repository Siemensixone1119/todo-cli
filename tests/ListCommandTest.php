<?php

require_once __DIR__ . "/../src/commands/ListCommand.php";
require_once __DIR__ . "/../src/commands/AddCommand.php";
require_once __DIR__ . "/../src/commands/MarkCommand.php";
require_once __DIR__ . "/TestCase.php";

class ListCommandTest extends CommandTestCase
{
  public function testGetTaskList()
  {
    AddCommand([null, "add", "description1"]);
    AddCommand([null, "add", "description2"]);
    AddCommand([null, "add", "description3"]);
    $json = json_decode(file_get_contents($this->path), true);

    $list = ListCommand([null, "list"]);
    $this->assertCount(3, $list);


    MarkCommand([null, "mark-in-progress", 1]);
    MarkCommand([null, "mark-in-progress", 2]);
    MarkCommand([null, "mark-in-progress", 3]);
    $json = json_decode(file_get_contents($this->path), true);

    $list = ListCommand([null, "list"]);
    $this->assertCount(3, $list);
    foreach ($list as $task) {
      $this->assertEquals("in-progress", $task["status"]);
    }


    MarkCommand([null, "mark-done", 1]);
    MarkCommand([null, "mark-done", 2]);
    MarkCommand([null, "mark-done", 3]);
    $json = json_decode(file_get_contents($this->path), true);

    $list = ListCommand([null, "list"]);
    $this->assertCount(3, $list);
    foreach ($list as $task) {
      $this->assertEquals("done", $task["status"]);
    }
  }
}
