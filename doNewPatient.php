<?php
    include_once "inc/prelude.php";

    connectDB();

    $sql = "insert into pharmacy.Patient (firstName, lastName, birthDate, address, tel, sex, ssn) values ($1, $2, $3, $4, $5, $6, $7)";
    $ret = pg_query_params($db, $sql, [$_POST["firstName"],
        $_POST["lastName"],
        $_POST["birthDate"],
        $_POST["address"],
        $_POST["tel"],
        $_POST["sex"],
        $_POST["ssn"]]);
    closeDB();

    if (!$ret) {
        setFlash(pg_last_error($db));
    }
    else {
        header("Location: patients.php");
    }
?>