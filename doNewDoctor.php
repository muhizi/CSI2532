<?php
    include_once "inc/prelude.php";

    connectDB();

    $sql = "insert into pharmacy.Doctor (firstName, lastName, address, tel, specialty, secretary) values ($1, $2, $3, $4, $5, $6)";
    $ret = pg_query_params($db, $sql, [$_POST["firstName"], $_POST["lastName"], $_POST["address"], $_POST["tel"], $_POST["specialty"], $_POST["secretary"]]);
    closeDB();

    if (!$ret) {
        setFlash(pg_last_error($db));
    }
    else {
        header("Location: doctors.php");
    }
?>