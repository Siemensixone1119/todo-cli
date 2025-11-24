<?php
include_once __DIR__ . "/../helpers/LoadData.php";
include_once __DIR__ . "/../helpers/SaveData.php";

function DeleteCommand($arguments)
{
     $data = LoadData();

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
    SaveData($data);
    echo "Задача удалена";
};
