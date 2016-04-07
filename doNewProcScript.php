<?php
    include_once "inc/prelude.php";

    connectDB();

    $sql = "insert into pharmacy.ProcScript (procName, doctor, patient, date) values ($1, $2, $3, $4)";
    $ret = pg_query_params($db, $sql,
        [$_POST["procName"],
        $_POST["doctor"],
        $_POST["patient"],
        $_POST["date"]]);
    closeDB();

    if (!$ret) {
        setFlash(pg_last_error($db));
    }
    else {
        header("Location: prescriptions.php");
    }
?>