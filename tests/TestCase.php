<?php

use PHPUnit\Framework\TestCase;

abstract class CommandTestCase extends TestCase
{
  protected string $path;
  protected function setUp(): void
  {
    $this->path = __DIR__ . "/temp_" . uniqid() . ".json";
    file_put_contents($this->path, json_encode(["tasks" => []], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    $GLOBALS["TASKS"] = $this->path;
    ob_start();
  }

  protected function tearDown(): void
  {
    if (file_exists($this->path)) {
      unlink($this->path);
    }
    ob_end_clean();
  }
}