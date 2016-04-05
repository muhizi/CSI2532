<?php
    include_once "inc/prelude.php";

    connectDB();

    $sql = <<<EOF
        update pharmacy.Doctor
        set firstName=$1, lastName=$2, address=$3, tel=$4, specialty=$5, secretary=$6
        where id = $7;
EOF;

    $ret = pg_query_params($db, $sql, [$_POST["firstName"], $_POST["lastName"], $_POST["address"], $_POST["tel"], $_POST["specialty"], $_POST["secretary"], $_POST["id"]]);
    closeDB();

    if (!$ret) {
        setFlash(pg_last_error($db));
    }
    else {
        header("Location: doctors.php");
    }
?>