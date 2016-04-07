<?php
    include_once "inc/prelude.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pharmabase :: Doctors</title>
    <?php include "inc/resources.php" ?>
</head>
<body>
    <div class="wrapper">
        <header>
            <h1>Pharmabase</h1>
            <?php breadcrumb("Doctors") ?>
        </header>

        <a href="newDoctorView.php" class="new">New</a>

        <?php
            connectDB();
            $sql = <<<EOF
            select d.id, d.firstName, d.lastName, d.address, d.tel, d.specialty, s.name
            from pharmacy.Doctor d join
            (select id, id || ': ' || firstName || ' ' || lastName as name from pharmacy.Secretary) s
            on d.secretary = s.id;
EOF;
            $ret = pg_query($db, $sql);
            closeDB();

            if(!$ret) {
                echo pg_last_error($db);
            }
            else {
                datatable(["ID", "First Name", "Last Name", "Address", "Telephone", "Specialty", "Secretary"]);

                while ($row = pg_fetch_row($ret)) {
                    echo "<tr>";
                    for ($i = 0; $i < 7; $i++) {
                        echo "<td>", $row[$i], "</td>";
                    }

                    editCell("Doctor", $row[0]);
                    deleteCell("Doctor", $row[0]);

                    echo "</tr>";
                }

                endDatatable();
            }
        ?>
    </div>
</body>
</html>