<?php
    include_once "inc/prelude.php";

    connectDB();

    $sql = "select * from pharmacy.DrugConflict where id = $1";
    $ret = pg_query_params($db, $sql, [$_GET["id"]]);
    closeDB();
    if (!$ret) {
        setFlash("This isn't the drug conflict you're looking for.");
        header("Location: conflicts.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pharmabase :: Edit Drug Conflict</title>
    <?php include "inc/resources.php" ?>
</head>
<body>
    <div class="wrapper">
        <header>
            <h1>Pharmabase</h1>
            <?php breadcrumb("Edit Drug Conflict") ?>
        </header>

        <?php  $r = pg_fetch_row($ret); ?>
        <form action="doEditDrugConflict.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $r[0] ?>"><br />
            Substance 1: <?php substanceSelect("substance1", $r[1]) ?><br />
            Substance 2: <?php substanceSelect("substance2", $r[2]) ?><br />
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>