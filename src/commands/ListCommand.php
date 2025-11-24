<?php
function ListCommand($arguments)
{
  $path = __DIR__ . "/../data/tasks.json";
  $data = file_get_contents($path);

  if (!file_exists($path)) {
    echo "файл tasks.json не найден";
    return;
  }
  ;

  $data = json_decode($data, true);

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
    echo "Параметры комманды введены некорректно";
    return;
  }

  foreach ($result as $task) {
    echo $task["id"] . "\n";
    echo $task["description"] . "\n";
    echo $task["status"] . "\n";
    echo $task["createdAt"] . "\n";
    echo $task["updatedAt"] . "\n\n";
  }
}
;
