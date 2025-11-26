<?php
include_once __DIR__ . "/../helpers/LoadData.php";
include_once __DIR__ . "/../helpers/SaveData.php";
include_once __DIR__ . "/../helpers/GenerateTime.php";

function UpdateCommand($arguments)
{
  $data = LoadData();

  $id = ($arguments[2]) ? (int) $arguments[2] : null;
  $description = $arguments[3] ?? null;

  if (empty($id)) {
    echo "Отсутствует id задачи\n";
    return;
  }

  if (empty($description)) {
    echo "Отсутствует описание задачи\n";
    return;
  }

  $found_id = false;

  foreach ($data["tasks"] as $task_id => $task) {
    if ($task["id"] == $id) {
      $data["tasks"][$task_id]["description"] = $description;
      $data["tasks"][$task_id]["updatedAt"] = GenerateTime();
      $found_id = true;
      break;
    }
  }

  if (!$found_id) {
    echo "Задача не найдена\n";
    return;
  }

  SaveData($data);
  echo "Задача обновленна\n";
}
;
