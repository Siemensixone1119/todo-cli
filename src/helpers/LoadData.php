<?php
function LoadData()
{
  $path = __DIR__ . "/../data/tasks.json";
  $data = file_get_contents($path);

  if (!file_exists($path)) {
    echo "файл tasks.json не найден";
    return;
  }
  ;

  if(!$data["tasks"]){
    echo "поле tasks отсутствует в raska.json"; 
  }

  $data = json_decode($data, true);
  return $data;
}
