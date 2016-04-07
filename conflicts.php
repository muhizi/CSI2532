<?php
    include_once "inc/prelude.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pharmabase :: Drugs</title>
    <?php include "inc/resources.php" ?>
</head>
<body>
    <div class="wrapper">
        <header>
            <h1>Pharmabase</h1>
            <?php breadcrumb("Conflicts") ?>
        </header>

        <?php flash(); ?>

        <h2>Drug-Drug Conflicts</h2>

        <a href="newDrugConflictView.php" class="new">New</a>

        <?php
            connectDB();
            $sql = "select * from pharmacy.DrugConflict;";
            $ret = pg_query($db, $sql);
            if(!$ret) {
                echo pg_last_error($db);
            }
            else {
                datatable(["ID", "Substance 1", "Substance 2"]);

                while ($row = pg_fetch_row($ret)) {
                    echo "<tr>";
                    for ($i = 0; $i < 3; $i++) {
                        echo "<td>", $row[$i], "</td>";
                    }

                    editCell("DrugConflict", $row[0]);
                    deleteCell("DrugConflict", $row[0]);

                    echo "</tr>";
                }

                endDatatable();
            }
            closeDB();
        ?>

        <h2>Drug-Pathology Conflicts</h2>

        <a href="newDrugPathologyConflictView.php" class="new">New</a>

        <?php
            connectDB();
            $sql = "select c.id, c.substance, p.name from pharmacy.DrugPathologyConflict c join pharmacy.Pathology p on c.pathology = p.id;";
            $ret = pg_query($db, $sql);
            if(!$ret) {
                echo pg_last_error($db);
            }
            else {
                datatable(["ID", "Substance", "Pathology"]);

                while ($row = pg_fetch_row($ret)) {
                    echo "<tr>";
                    for ($i = 0; $i < 3; $i++) {
                        echo "<td>", $row[$i], "</td>";
                    }

                    editCell("DrugPathologyConflict", $row[0]);
                    deleteCell("DrugPathologyConflict", $row[0]);

                    echo "</tr>";
                }

                endDatatable();
            }
            closeDB();
        ?>
    </div>
</body>
</html>