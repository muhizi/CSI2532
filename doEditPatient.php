<?php
    include_once "inc/prelude.php";

    connectDB();

    $sql = <<<EOF
        update pharmacy.Patient
        set firstName=$1, lastName=$2, birthDate= $3, address=$4, tel=$5, sex=$6, ssn=$7
        where id = $8;
EOF;

    $ret = pg_query_params($db, $sql, [$_POST["firstName"],
        $_POST["lastName"],
        $_POST["birthDate"],
        $_POST["address"],
        $_POST["tel"],
        $_POST["sex"],
        $_POST["ssn"],
        $_POST["id"]]);
    closeDB();

    if (!$ret) {
        setFlash(pg_last_error($db));
    }
    else {
        header("Location: patients.php");
    }
?>