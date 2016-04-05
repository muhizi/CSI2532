<?php
    include_once "inc/prelude.php";

    connectDB();

    $sql = <<<EOF
        update pharmacy.Secretary
        set firstName=$1, lastName=$2, address=$3, tel=$4
        where id = $5;
EOF;

    $ret = pg_query_params($db, $sql, [$_POST["firstName"], $_POST["lastName"], $_POST["address"], $_POST["tel"], $_POST["id"]]);
    closeDB();

    if (!$ret) {
        setFlash(pg_last_error($db));
    }
    else {
        header("Location: secretaries.php");
    }
?>