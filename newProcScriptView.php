<?php
    include_once "inc/prelude.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pharmabase :: New Procedure Script</title>
    <?php include "inc/resources.php" ?>
</head>
<body>
    <div class="wrapper">
        <header>
            <h1>Pharmabase</h1>
            <?php breadcrumb("New Procedure Script") ?>
        </header>

        <form action="doNewProcScript.php" method="POST">
            Procedure: <input type="text" name="procName"><br />
            Doctor: <?php doctorSelect() ?><br />
            Patient: <?php patientSelect() ?><br />
            Date: <input type="text" class="datepicker" name="date"><br />
            <input type="submit" value="Submit">
        </form>

    </div>
</body>
</html>