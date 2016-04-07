<?php
    include_once "inc/prelude.php";

    connectDB();

    $sql = "select * from pharmacy.ProcScript where id = $1";
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
    <title>Pharmabase :: Edit Procedure Script</title>
    <?php include "inc/resources.php" ?>
</head>
<body>
    <div class="wrapper">
        <header>
            <h1>Pharmabase</h1>
            <?php breadcrumb("Edit Procedure Script") ?>
        </header>

        <?php  $r = pg_fetch_row($ret); ?>
        <form action="doEditProcScript.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $r[0] ?>"><br />
            Procedure: <input type="text" name="procName" value="<?php echo $r[1] ?>"><br />
            Doctor: <?php doctorSelect($r[2]) ?><br />
            Patient: <?php patientSelect($r[3]) ?><br />
            Date: <input type="text" class="datepicker" name="date" value="<?php echo $r[4] ?>"><br />
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>