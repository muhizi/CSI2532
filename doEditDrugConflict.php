<?php
    include_once "inc/prelude.php";

    connectDB();

    $sql = <<<EOF
        update pharmacy.DrugConflict
        set substance1=$1, substance2=$2
        where id = $3;
EOF;

    $ret = pg_query_params($db, $sql,
        [$_POST["substance1"],
        $_POST["substance2"],
        $_POST["id"]]);
    closeDB();

    if (!$ret) {
        setFlash(pg_last_error($db));
    }
    else {
        header("Location: conflicts.php");
    }
?>