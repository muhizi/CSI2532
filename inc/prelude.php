<?php

session_start();

include_once "tables.php";

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

function secretarySelect($id = -1) {
    echo "<select name='secretary'>";
    connectDB();
    $ret = pg_query("select id, id::text || ': ' || firstName || ' ' || lastName as name from pharmacy.Secretary order by id;");
    closeDB();

    while ($row = pg_fetch_row($ret)) {
        $selected = "";
        if ($id == $row[0]) {
            $selected = "selected";
        }
        echo "<option value='$row[0]' $selected>$row[1]</option>";
    }
    echo "</select>";
}

?>