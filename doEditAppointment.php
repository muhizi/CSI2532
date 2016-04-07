<?php
    include_once "inc/prelude.php";

    connectDB();

    $sql = <<<EOF
        update pharmacy.Appointment
        set date=$1, endDate=$2, remarks=$3, patient=$4, doctor=$5
        where id = $6;
EOF;

    $ret = pg_query_params($db, $sql,
        [$_POST["date"],
        $_POST["endDate"],
        $_POST["remarks"],
        $_POST["patient"],
        $_POST["doctor"],
        $_POST["id"]]);
    closeDB();

    if (!$ret) {
        setFlash(pg_last_error($db));
    }
    else {
        header("Location: appointments.php");
    }
?>