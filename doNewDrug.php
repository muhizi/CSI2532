<?php
    include_once "inc/prelude.php";

    connectDB();

    $sql = "insert into pharmacy.Drug (name, price, substance, generic) values ($1, $2, $3, $4)";
    $ret = pg_query_params($db, $sql,
        [$_POST["name"],
        $_POST["price"],
        $_POST["substance"],
        getBoolParam("generic")]);
    closeDB();

    if (!$ret) {
        setFlash(pg_last_error($db));
    }
    else {
        header("Location: drugs.php");
    }
?>