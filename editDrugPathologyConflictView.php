<?php
    include_once "inc/prelude.php";

    connectDB();

    $sql = "select * from pharmacy.DrugPathologyConflict where id = $1";
    $ret = pg_query_params($db, $sql, [$_GET["id"]]);
    closeDB();
    if (!$ret) {
        setFlash("This isn't the pathology conflict you're looking for.");
        header("Location: conflicts.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pharmabase :: Edit Drug-Pathology Conflict</title>
    <?php include "inc/resources.php" ?>
</head>
<body>
    <div class="wrapper">
        <header>
            <h1>Pharmabase</h1>
            <?php breadcrumb("Edit Drug-Pathology Conflict") ?>
        </header>

        <?php  $r = pg_fetch_row($ret); ?>
        <form action="doEditDrugPathologyConflict.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $r[0] ?>"><br />
            Substance: <?php substanceSelect("substance", $r[1]) ?><br />
            Pathology: <?php pathologySelect($r[2]) ?><br />
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>