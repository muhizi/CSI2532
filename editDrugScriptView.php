<?php
    include_once "inc/prelude.php";

    connectDB();

    $sql = "select * from pharmacy.DrugScript where id = $1";
    $ret = pg_query_params($db, $sql, [$_GET["id"]]);
    closeDB();
    if (!$ret) {
        setFlash("This isn't the script you're looking for.");
        header("Location: prescriptions.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pharmabase :: Edit Drug Script</title>
    <?php include "inc/resources.php" ?>
</head>
<body>
    <div class="wrapper">
        <header>
            <h1>Pharmabase</h1>
            <?php breadcrumb("Edit Drug Script") ?>
        </header>

        <?php  $r = pg_fetch_row($ret); ?>
        <form action="doEditDrugScript.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $r[0] ?>"><br />
            Drug: <?php drugSelect($r[1]) ?><br />
            Doctor: <?php doctorSelect($r[2]) ?><br />
            Patient: <?php patientSelect($r[3]) ?><br />
            Date: <input type="text" class="datepicker" name="date" value="<?php echo $r[4] ?>"><br />
            Valid Days: <input type="number" name="validDays" value="<?php echo $r[5] ?>" /><br />
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>