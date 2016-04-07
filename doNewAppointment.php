<?php
    include_once "inc/prelude.php";

    connectDB();

    $sql = "insert into pharmacy.Appointment (date, endDate, remarks, patient, doctor) values ($1, $2, $3, $4, $5)";
    $ret = pg_query_params($db, $sql,
        [$_POST["date"],
        $_POST["endDate"],
        $_POST["remarks"],
        $_POST["patient"],
        $_POST["doctor"]]);
    closeDB();

    if (!$ret) {
        setFlash(pg_last_error($db));
    }
    else {
        header("Location: appointments.php");
    }
?>