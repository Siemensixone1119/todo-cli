<?php

function SaveData($data)
{
  $path = __DIR__ . "/../data/tasks.json";
  file_put_contents($path, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}