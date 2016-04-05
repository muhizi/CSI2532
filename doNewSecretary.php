<?php
    include_once "inc/prelude.php";

    connectDB();

    $sql = "insert into pharmacy.Secretary (firstName, lastName, address, tel) values ($1, $2, $3, $4)";
    $ret = pg_query_params($db, $sql, [$_POST["firstName"], $_POST["lastName"], $_POST["address"], $_POST["tel"]]);
    closeDB();

    if (!$ret) {
        setFlash(pg_last_error($db));
    }
    else {
        header("Location: secretaries.php");
    }
?>