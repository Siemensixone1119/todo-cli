<?php
function LoadData()
{
  $path = $GLOBALS["TASKS"] ?? (__DIR__ . "/../data/tasks.json");

  if (!file_exists($path)) {
    echo "файл tasks.json не найден";
    return;
  }

  $data = json_decode(file_get_contents($path), true);

  if (!$data["tasks"]) {
    echo "поле tasks отсутствует в raska.json";
  }

  return $data;

}
