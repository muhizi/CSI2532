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
    if (isset($_SESSION["flash"])) {
        include "flash.php";
    }
    $_SESSION["flash"] = null;
}

function breadcrumb($page) {
    echo "<span class='breadcrumb'>";
    echo "<a href='index.php'>HOME</a>";
    echo " <i class='fa fa-angle-double-right'></i> ";
    echo $page;
    echo "</span>";
}

function setFlash($msg) {
    $_SESSION["flash"] = $msg;
}

function getBoolParam($param) {
    if ($_POST[$param]) {
        return "TRUE";
    }
    return "FALSE";
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

function doctorSelect($id = -1) {
    echo "<select name='doctor'>";
    connectDB();
    $ret = pg_query("select id, id::text || ': ' || firstName || ' ' || lastName as name from pharmacy.Doctor order by id;");
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

function patientSelect($id = -1) {
    echo "<select name='patient'>";
    connectDB();
    $ret = pg_query("select id, id::text || ': ' || firstName || ' ' || lastName as name from pharmacy.Patient order by id;");
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

function sexSelect($sex = 'M') {
    echo "<select name='sex'>";
    if ($sex == 'M') {
        echo "<option value='M' selected>Male</option>";
        echo "<option value='F'>Female</option>";
    }
    else {
        echo "<option value='M'>Male</option>";
        echo "<option value='F' selected>Female</option>";
    }
    echo "</select>";
}

function substanceSelect($name="substance", $sub = "") {
    echo "<select name='$name'>";
    connectDB();
    $ret = pg_query("select distinct substance from pharmacy.Drug order by substance;");
    closeDB();

    while ($row = pg_fetch_row($ret)) {
        $selected = "";
        if ($sub == $row[0]) {
            $selected = "selected";
        }
        echo "<option value='$row[0]' $selected>$row[0]</option>";
    }
    echo "</select>";
}

function pathologySelect($id = -1) {
    echo "<select name='pathology'>";
    connectDB();
    $ret = pg_query("select id, name from pharmacy.Pathology order by name;");
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

function drugSelect($id = -1) {
    echo "<select name='drug'>";
    connectDB();
    $ret = pg_query("select id, name from pharmacy.Drug order by name;");
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