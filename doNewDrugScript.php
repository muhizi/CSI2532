<?php
    include_once "inc/prelude.php";

    connectDB();

    $sql = "insert into pharmacy.DrugScript (drug, doctor, patient, date, validDays) values ($1, $2, $3, $4, $5)";
    $ret = pg_query_params($db, $sql,
        [$_POST["drug"],
        $_POST["doctor"],
        $_POST["patient"],
        $_POST["date"],
        $_POST["validDays"]]);
    closeDB();

    if (!$ret) {
        setFlash(pg_last_error($db));
    }
    else {
        header("Location: prescriptions.php");
    }
?>