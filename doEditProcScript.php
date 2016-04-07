<?php
    include_once "inc/prelude.php";

    connectDB();

    $sql = <<<EOF
        update pharmacy.ProcScript
        set procName=$1, doctor=$2, patient=$3, date=$4
        where id = $5;
EOF;

    $ret = pg_query_params($db, $sql,
        [$_POST["procName"],
        $_POST["doctor"],
        $_POST["patient"],
        $_POST["date"],
        $_POST["id"]]);
    closeDB();

    if (!$ret) {
        setFlash(pg_last_error($db));
    }
    else {
        header("Location: prescriptions.php");
    }
?>