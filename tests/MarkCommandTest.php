<?php

require_once __DIR__ . "/../src/commands/MarkCommand.php";
require_once __DIR__ . "/../src/commands/AddCommand.php";
require_once __DIR__ . "/TestCase.php";

class MarkCommandTest extends CommandTestCase
{
  public function testMarkTask()
  {
    AddCommand([null, "add", "description1"]);
    AddCommand([null, "add", "description2"]);
    $json = json_decode(file_get_contents($this->path), true);

    MarkCommand([null, "mark-in-progress", 1]);
    MarkCommand([null, "mark-done", 2]);
    $json = json_decode(file_get_contents($this->path), true);
    $this->assertEquals("in-progress", $json["tasks"][0]["status"]);
    $this->assertEquals("done", $json["tasks"][1]["status"]);
  }
}