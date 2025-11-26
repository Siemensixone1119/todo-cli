<?php
include_once __DIR__ . "/../helpers/LoadData.php";
include_once __DIR__ . "/../helpers/SaveData.php";

function MarkCommand($arguments)
{

  $data = LoadData();

  $command = $arguments[1];

  $id = ($arguments[2]) ? (int) $arguments[2] : null;

  switch ($command) {
    case "mark-in-progress":
      $status = "in-progress";
      break;
    case "mark-done":
      $status = "done";
      break;
    default:
      echo "Команда введенеа некорректно\n";
      return;
  }
  ;

  if (empty($id)) {
    echo "Отсутствует id задачи\n";
    return;
  }
  ;

  $found_id = false;

  foreach ($data["tasks"] as $task_id => $task) {
    if ($task["id"] == $id) {
      $data["tasks"][$task_id]["status"] = $status;
      $found_id = true;
      break;
    }
    ;
  }
  ;

  if (!$found_id) {
    echo "Задача не найдена\n";
    return;
  }

  SaveData($data);
  echo "Статус задачи изменен\n";
}
;
