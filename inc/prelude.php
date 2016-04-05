<?php

session_start();

// This is a global.
// I know it's bad practice, but for this project it's the simplest solution.
$db = null;

function connectDB() {
    global $db;
    $db = pg_connect("host=localhost port=5432 dbname=pharmacy user=postgres password=admin");
    if (!$db) {
        echo "Error : Unable to open database\n";
    }
}

function closeDB() {
    global $db;
    pg_close($db);
}

function flash() {
    if ($_SESSION["flash"]) {
        include "flash.php";
    }
    $_SESSION["flash"] = null;
}

function setFlash($msg) {
    $_SESSION["flash"] = $msg;
}

?>