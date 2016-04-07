<?php
    include_once "inc/prelude.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pharmabase :: Prescriptions</title>
    <?php include "inc/resources.php" ?>
</head>
<body>
    <div class="wrapper">
        <header>
            <h1>Pharmabase</h1>
            <?php breadcrumb("Prescriptions") ?>
        </header>

        <h2>Drug Prescriptions</h2>

        <a href="newDrugScriptView.php" class="new">New</a>

        <?php
            connectDB();
            $sql = <<<EOF
                select s.id, d.name, m.lastName, p.lastName, s.date, s.validDays
                from pharmacy.DrugScript s
                join pharmacy.Drug d on s.drug = d.id
                join pharmacy.Doctor m on s.doctor = m.id
                join pharmacy.Patient p on s.patient = p.id;
EOF;
            $ret = pg_query($db, $sql);
            if(!$ret) {
                echo pg_last_error($db);
            }
            else {
                datatable(["ID", "Drug", "Doctor", "Patient", "Date", "Valid Days"]);

                while ($row = pg_fetch_row($ret)) {
                    echo "<tr>";
                    for ($i = 0; $i < 6; $i++) {
                        echo "<td>", $row[$i], "</td>";
                    }

                    editCell("DrugScript", $row[0]);
                    deleteCell("DrugScript", $row[0]);

                    echo "</tr>";
                }

                endDatatable();
            }
            closeDB();
        ?>

        <h2>Procedure Prescriptions</h2>

        <a href="newProcScriptView.php" class="new">New</a>

        <?php
            connectDB();
            $sql = <<<EOF
                select s.id, s.procName, m.lastName, p.lastName, s.date
                from pharmacy.ProcScript s
                join pharmacy.Doctor m on s.doctor = m.id
                join pharmacy.Patient p on s.patient = p.id;
EOF;
            $ret = pg_query($db, $sql);
            if(!$ret) {
                echo pg_last_error($db);
            }
            else {
                datatable(["ID", "Procedure", "Doctor", "Patient", "Date"]);

                while ($row = pg_fetch_row($ret)) {
                    echo "<tr>";
                    for ($i = 0; $i < 5; $i++) {
                        echo "<td>", $row[$i], "</td>";
                    }

                    editCell("ProcScript", $row[0]);
                    deleteCell("ProcScript", $row[0]);

                    echo "</tr>";
                }

                endDatatable();
            }
            closeDB();
        ?>
    </div>
</body>
</html>