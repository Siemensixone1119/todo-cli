<?php
function DeleteCommand($arguments)
{
    $path = __DIR__ . "/../data/tasks.json";
    $data = file_get_contents($path);


    if (!file_exists($path)) {
        echo "файл tasks.json не найден";
        return;
    };

    $data = json_decode($data, true);

    $id = ($arguments[2]) ? (int)$arguments[2] : null;
    if (empty($id)) {
        echo "Отсутствует id задачи";
        return;
    }

    $found_id = false;

    foreach ($data["tasks"] as $task_id => $task) {
        if ($task["id"] == $id) {
            unset($data["tasks"][$task_id]);
            $found_id = true;
            break;
        }
    }

    if (!$found_id) {
        echo "Задача не найдена";
        return;
    }

    $data["tasks"] = array_values($data["tasks"]);
    file_put_contents($path, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    echo "Задача удалена";
};
