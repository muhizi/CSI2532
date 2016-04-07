<?php
    include_once "inc/prelude.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pharmabase :: New Drug Conflict</title>
    <?php include "inc/resources.php" ?>
</head>
<body>
    <div class="wrapper">
        <header>
            <h1>Pharmabase</h1>
            <?php breadcrumb("New Drug Conflict") ?>
        </header>

        <form action="doNewDrugConflict.php" method="POST">
            Substance 1: <?php substanceSelect("substance1") ?><br />
            Substance 2: <?php substanceSelect("substance2") ?><br />
            <input type="submit" value="Submit">
        </form>

    </div>
</body>
</html>