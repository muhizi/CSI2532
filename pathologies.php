<?php
    include_once "inc/prelude.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pharmabase :: Pathologies</title>
    <?php include "inc/resources.php" ?>
</head>
<body>
    <div class="wrapper">
        <header>
            <h1>Pharmabase</h1>
            <?php breadcrumb("Pathologies") ?>
        </header>

        <a href="newPathologyView.php" class="new">New</a>

        <?php
            connectDB();
            $sql = "select * from pharmacy.Pathology;";
            $ret = pg_query($db, $sql);
            if(!$ret) {
                echo pg_last_error($db);
            }
            else {
                datatable(["ID", "Name"]);

                while ($row = pg_fetch_row($ret)) {
                    echo "<tr>";
                    for ($i = 0; $i < 2; $i++) {
                        echo "<td>", $row[$i], "</td>";
                    }

                    editCell("Pathology", $row[0]);
                    deleteCell("Pathology", $row[0]);

                    echo "</tr>";
                }

                endDatatable();
            }
            closeDB();
        ?>
    </div>
</body>
</html>