<?php
function UpdateCommand($arguments)
{
  $path = __DIR__ . "/../data/tasks.json";
  $data = file_get_contents($path);

  if (!file_exists($path)) {
    echo "файл tasks.json не найден";
    return;
  }
  ;

  $data = json_decode($data, true);

  $id = ($arguments[2]) ? (int) $arguments[2] : null;
  $description = $arguments[3] ?? null;

  if (empty($id)) {
    echo "Отсутствует id задачи";
    return;
  }

  if (empty($description)) {
    echo "Отсутствует описание задачи";
    return;
  }

  $found_id = false;

  foreach ($data["tasks"] as $task_id => $task) {
    if ($task["id"] == $id) {
      $data["tasks"][$task_id]["description"] = $description;
      $data["tasks"][$task_id]["updatedAt"] = (new DateTime("now", new DateTimeZone("+03:00")))->format("Y-m-d H:i");
      $found_id = true;
      break;
    }
  }

  if (!$found_id) {
    echo "Задача не найдена";
    return;
  }

  file_put_contents($path, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
  echo "Задача обновленна";
}
;
