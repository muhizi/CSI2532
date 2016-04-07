<?php
    include_once "inc/prelude.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pharmabase :: New Drug-Pathology Conflict</title>
    <?php include "inc/resources.php" ?>
</head>
<body>
    <div class="wrapper">
        <header>
            <h1>Pharmabase</h1>
            <?php breadcrumb("New Drug-Pathology Conflict") ?>
        </header>

        <form action="doNewDrugPathologyConflict.php" method="POST">
            Substance: <?php substanceSelect() ?><br />
            Pathology: <?php pathologySelect() ?><br />
            <input type="submit" value="Submit">
        </form>

    </div>
</body>
</html>