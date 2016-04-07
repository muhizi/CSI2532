<?php
    include_once "inc/prelude.php";

    connectDB();

    $sql = <<<EOF
        update pharmacy.DrugScript
        set drug=$1, doctor=$2, patient=$3, date=$4, validDays=$5
        where id = $6;
EOF;

    $ret = pg_query_params($db, $sql,
        [$_POST["drug"],
        $_POST["doctor"],
        $_POST["patient"],
        $_POST["date"],
        $_POST["validDays"],
        $_POST["id"]]);
    closeDB();

    if (!$ret) {
        setFlash(pg_last_error($db));
    }
    else {
        header("Location: prescriptions.php");
    }
?>