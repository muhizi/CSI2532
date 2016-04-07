<?php
    include_once "inc/prelude.php";

    connectDB();

    $sql = <<<EOF
        update pharmacy.DrugPathologyConflict
        set substance=$1, pathology=$2
        where id = $3;
EOF;

    $ret = pg_query_params($db, $sql,
        [$_POST["substance"],
        $_POST["pathology"],
        $_POST["id"]]);
    closeDB();

    if (!$ret) {
        setFlash(pg_last_error($db));
    }
    else {
        header("Location: conflicts.php");
    }
?>