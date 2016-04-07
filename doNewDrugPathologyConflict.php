<?php
    include_once "inc/prelude.php";

    connectDB();

    $sql = "insert into pharmacy.DrugPathologyConflict (substance, pathology) values ($1, $2)";
    $ret = pg_query_params($db, $sql,
        [$_POST["substance"],
        $_POST["pathology"]]);
    closeDB();

    if (!$ret) {
        setFlash(pg_last_error($db));
    }
    else {
        header("Location: conflicts.php");
    }
?>