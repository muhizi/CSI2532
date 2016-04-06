<?php
    include_once "inc/prelude.php";

    connectDB();

    $sql = <<<EOF
        update pharmacy.Drug
        set name=$1, price=$2, substance=$3, generic=$4
        where id = $5;
EOF;

    $ret = pg_query_params($db, $sql,
        [$_POST["name"],
        $_POST["price"],
        $_POST["substance"],
        getBoolParam("generic"),
        $_POST["id"]]);
    closeDB();

    if (!$ret) {
        setFlash(pg_last_error($db));
    }
    else {
        header("Location: drugs.php");
    }
?>