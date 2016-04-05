<?php
include_once 'prelude.php';

$query = file_get_contents("../sql/createSchema.sql");
connectDB();
$ret = pg_query($db, $query);
closeDB();

if (!$ret) {
    setFlash(pg_last_error($db));
}
else {
    setFlash("Database reset");
}

// Redirect
header('Location: ../options.php');

?>
