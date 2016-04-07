<?php
    include_once "inc/prelude.php";

    connectDB();

    $sql = "insert into pharmacy.Pathology (name) values ($1)";
    $ret = pg_query_params($db, $sql,[$_POST["name"]]);
    closeDB();

    if (!$ret) {
        setFlash(pg_last_error($db));
    }
    else {
        header("Location: pathologies.php");
    }
?>