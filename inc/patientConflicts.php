<?php
    include_once 'prelude.php';

    connectDB();
    $p = $_GET["patient"];
    $d = $_GET["drug"];

     $q = <<<EOF
        select d.name, d2.name from pharmacy.Drug d
        join pharmacy.DrugConflict dc1 on dc1.substance1 = d.substance
        join pharmacy.Drug d2 on d2.substance = dc1.substance2
        join pharmacy.DrugScript s on s.drug = d2.id
        join pharmacy.Patient p on s.patient = p.id
        where d.id = $1 AND p.id = $2

        UNION

        select d.name, d2.name from pharmacy.Drug d
        join pharmacy.DrugConflict dc1 on dc1.substance2 = d.substance
        join pharmacy.Drug d2 on d2.substance = dc1.substance1
        join pharmacy.DrugScript s on s.drug = d2.id
        join pharmacy.Patient p on s.patient = p.id
        where d.id = $1 AND p.id = $2;
EOF;
    $r = pg_query_params($q, [$d, $p]);

    if (pg_num_rows($r) > 0) {
        echo "<h2>Warning</h2>";
        echo "<p>This prescription may have the following drug contraindications:</p>";
        while ($row = pg_fetch_row($r)) {
            echo "<p>$row[0] conflicts with $row[1].";
        }
    }

    $q = <<<EOF
        select d.name, pt.name from pharmacy.Drug d
        join pharmacy.DrugPathologyConflict dp on dp.substance = d.substance
        join pharmacy.Pathology pt on pt.id = dp.pathology
        join pharmacy.PatientPathology pp on pp.pathology = pt.id
        join pharmacy.Patient p on pp.patient = p.id
        where d.id = $1 AND p.id = $2;
EOF;
    $r = pg_query_params($q, [$d, $p]);

    if (pg_num_rows($r) > 0) {
        echo "<h2>Warning</h2>";
        echo "<p>This prescription may have the following pathology contraindications:</p>";
        while ($row = pg_fetch_row($r)) {
            echo "<p>$row[0] conflicts with $row[1].";
        }
    }

    closeDB();
?>