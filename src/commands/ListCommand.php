<?php
include_once __DIR__ . "/../helpers/LoadData.php";
include_once __DIR__ . "/../helpers/SaveData.php";
include_once __DIR__ . "/../helpers/ConsoleStyle.php";

function ListCommand($arguments)
{
  $data = LoadData();

  $item = $arguments[2] ?? null;

  $result = [];

  if (empty($item)) {
    foreach ($data["tasks"] as $task) {
      array_push($result, $task);
    }
  } elseif ($item === "done") {
    foreach ($data["tasks"] as $task) {
      if ($task["status"] === "done") {
        array_push($result, $task);
      }
    }
  } elseif ($item === "in-progress") {
    foreach ($data["tasks"] as $task) {
      if ($task["status"] === "in-progress") {
        array_push($result, $task);
      }
    }
  } elseif ($item === "todo") {
    foreach ($data["tasks"] as $task) {
      if ($task["status"] === "in-progress") {
        array_push($result, $task);
      }
    }
  } else {
    echo "Параметры комманды введены некорректно\n";
    return;
  }

  foreach ($result as $task) {
    echo color("● ID: ", "cyan") . $task["id"] . "\n";
    echo color("  Описание: ", "white") . $task["description"] . "\n";
    echo color(
      "  Статус: ",
      $task["status"] === "done" ? "green" :
      ($task["status"] === "in-progress" ? "yellow" : "blue")
    ) . $task["status"] . "\n";
    echo color("  Создано: ", "purple") . $task["createdAt"] . "\n";
    echo color("  Обновлено: ", "purple") . $task["updatedAt"] . "\n";
    echo "\n";
  }

  return $result;
}
;
