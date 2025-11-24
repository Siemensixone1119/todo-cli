<?php

include_once __DIR__ . "/src/commands/AddCommand.php";
include_once __DIR__ . "/src/commands/UpdateCommand.php";
include_once __DIR__ . "/src/commands/DeleteCommand.php";
include_once __DIR__ . "/src/commands/ListCommand.php";
include_once __DIR__ . "/src/commands/MarkCommand.php";
include_once __DIR__ . "/src/commands/HelpCommand.php";

$arguments = $argv;
unset($arguments[0]);
$command = $arguments[1];

switch ($command) {
    case "add":
        AddCommand($arguments);
        break;
    case "update":
        UpdateCommand($arguments);
        break;
    case "delete":
        DeleteCommand($arguments);
        break;
    case "list":
        ListCommand($arguments);
        break;
    case "mark-in-progress":
    case "mark-done":
        MarkCommand($arguments);
        break;
    case "help":
    default:
        HelpCommand();
}
