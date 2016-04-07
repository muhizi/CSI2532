<?php
    include_once "inc/prelude.php";

    connectDB();

    $sql = "insert into pharmacy.DrugConflict (substance1, substance2) values ($1, $2)";
    $ret = pg_query_params($db, $sql,
        [$_POST["substance1"],
        $_POST["substance2"]]);
    closeDB();

    if (!$ret) {
        setFlash(pg_last_error($db));
    }
    else {
        header("Location: conflicts.php");
    }
?>