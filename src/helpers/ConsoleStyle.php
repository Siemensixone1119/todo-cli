<?php

function color($text, $color)
{
    $colors = [
        "red"    => "\033[31m",
        "green"  => "\033[32m",
        "yellow" => "\033[33m",
        "blue"   => "\033[34m",
        "purple" => "\033[35m",
        "cyan"   => "\033[36m",
        "white"  => "\033[37m",
    ];

    $reset = "\033[0m";

    return ($colors[$color] ?? "") . $text . $reset;
}

function consoleHeader($text)
{
    echo color("\n==============================\n", "cyan");
    echo color("  $text\n", "yellow");
    echo color("==============================\n\n", "cyan");
}

function consoleLine($command, $color, $desc = "")
{
    echo color("  $command", $color);
    if ($desc) echo color(" — $desc", "white");
    echo "\n";
}

function consoleFooter()
{
    echo color("\n==============================\n\n", "cyan");
}
