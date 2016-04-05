<?php
include_once 'prelude.php';

$q1 = file_get_contents("../sql/createSchema.sql");
$q2 = file_get_contents("../sql/createData.sql");

connectDB();

$ret = pg_query($db, $q1);
if (!$ret) {
    setFlash(pg_last_error($db));
}
else {
    $ret = pg_query($db, $q2);
    if (!$ret) {
        setFlash(pg_last_error($db));
    }
    else {
        setFlash("Loaded sample data");
    }
}

closeDB();

// Redirect
header('Location: ../options.php');

?>
