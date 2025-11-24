<?php
function AddCommand($arguments)
{
    $path = __DIR__ . "/../data/tasks.json";
    $data = file_get_contents($path);

    if (!file_exists($path)) {
        echo "файл tasks.json не найден";
        return;
    };

    $data = json_decode($data, true);

    $description = $arguments[2] ?? null;

    if (empty($description)) {
        echo "Отсутствует описание задачи";
        return;
    }

    $id = count($data["tasks"]) > 0 ? end($data["tasks"])["id"] + 1 : 1;

    $time = new DateTime("now", new DateTimeZone("+03:00"));

    $task = [
        "id" => $id,
        "description" => $description,
        "status" => "todo",
        "createdAt" => $time,
        "updatedAt" => $time,
    ];

    $data["tasks"][] = $task;
    file_put_contents($path, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    echo "Задача добавлена";
};
