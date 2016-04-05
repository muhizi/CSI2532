<?php
    include_once "inc/prelude.php";
    include_once "inc/tables.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pharmabase :: Doctors</title>
    <link rel="stylesheet" href="pharmabase.css">
</head>
<body>
    <div class="wrapper">
        <header>
            <h1>Pharmabase</h1>
        </header>

        <?php
            connectDB();
            $sql = <<<EOF
            select d.id, d.firstName, d.lastName, d.address, d.tel, specialty, s.firstName
            from pharmacy.Doctor d
                join pharmacy.Secretary s
                on d.secretary = s.id;
EOF;
            $ret = pg_query($db, $sql);
            if(!$ret) {
                echo pg_last_error($db);
            }
            else {
                datatable(["ID", "First Name", "Last Name", "Address", "Telephone", "Specialty", "Secretary"]);

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