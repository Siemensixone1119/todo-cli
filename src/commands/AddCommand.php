<?php
include_once __DIR__ . "/../helpers/LoadData.php";
include_once __DIR__ . "/../helpers/SaveData.php";
include_once __DIR__ . "/../helpers/GenerateTime.php";

function AddCommand($arguments)
{
    $data = LoadData();

    $description = $arguments[2] ?? null;

    if (empty($description)) {
        echo "Отсутствует описание задачи";
        return;
    }

    $id = count($data["tasks"]) > 0 ? end($data["tasks"])["id"] + 1 : 1;

    $task = [
        "id" => $id,
        "description" => $description,
        "status" => "todo",
        "createdAt" => GenerateTime(),
        "updatedAt" => GenerateTime(),
    ];

    $data["tasks"][] = $task;
    SaveData($data);
    echo "Задача добавлена";
}
;
