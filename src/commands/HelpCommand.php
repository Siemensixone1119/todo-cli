<?php
include_once __DIR__ . "/../helpers/ConsoleStyle.php";
function HelpCommand()
{
 consoleHeader("TODO CLI — список команд");

    consoleLine("add <description>", "green", "Добавить новую задачу");
    consoleLine("update <id> <description>", "green", "Обновить описание задачи");
    consoleLine("delete <id>", "green", "Удалить задачу");
    consoleLine("list [todo|in-progress|done]", "green", "Показать список задач");
    consoleLine("mark-in-progress <id>", "green", "Отметить как в процессе");
    consoleLine("mark-done <id>", "green", "Отметить как выполненную");
    consoleLine("help", "green", "Показать справку");

    consoleFooter();
}