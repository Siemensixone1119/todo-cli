<?php
function MarkCommand($arguments)
{
  $path = __DIR__ . "/../data/tasks.json";
  $data = file_get_contents($path);

  if (!file_exists($path)) {
    echo "файл tasks.json не найден";
    return;
  }
  ;

  $data = json_decode($data, true);

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
      echo "Некорректно введена команда";
  }
  ;


  if (empty($id)) {
    echo "Отсутствует id задачи";
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
    echo "Задача не найдена";
    return;
  }

  file_put_contents($path, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
  echo "Статус задачи изменен";
}
;
