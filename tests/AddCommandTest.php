<?php
require_once __DIR__ . "/../src/commands/AddCommand.php";
require_once __DIR__ . "/TestCase.php";

class AddCommandTest extends CommandTestCase
{
  public function testCreateTask(): void
  {
    AddCommand([null, "add", "description"]);
    $json = json_decode(file_get_contents($this->path), true);

    $this->assertCount(1, $json["tasks"]);
    $this->assertEquals("description", $json["tasks"][0]["description"]);
    $this->assertEquals("todo", $json["tasks"][0]["status"]);
  }
}
