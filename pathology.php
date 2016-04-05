<?php
    include_once "inc/prelude.php";
    include_once "inc/tables.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pharmabase :: Pathologies</title>
    <link rel="stylesheet" href="pharmabase.css">
</head>
<body>
    <div class="wrapper">
        <header>
            <h1>Pharmabase</h1>
        </header>

        <?php
            connectDB();
            $sql = "select * from pharmacy.Pathology;";
            $ret = pg_query($db, $sql);
            if(!$ret) {
                echo pg_last_error($db);
            }
            else {
                datatable(["ID", "Name"]);

                while($row = pg_fetch_row($ret)) {
                    row($row);
                }

                endDatatable();
            }
            closeDB();
        ?>
    </div>
</body>
</html>