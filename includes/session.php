<?php

session_start();
function message()
{
    if (isset($_SESSION["message"])) {
        $output = "<div class=\"message\">";
        $output .= htmlentities($_SESSION["message"], ENT_QUOTES, "UTF-8");
        $output .= "</div>";
        // очистка messege после использования
        $_SESSION["message"] = null;
        return $output;
    }
}

function errors()
{
    if (isset($_SESSION["errors"])) {
        $errors = $_SESSION["errors"];

        // очистка messege после использования
        $_SESSION["errors"] = null;

        return $errors;
    }
}