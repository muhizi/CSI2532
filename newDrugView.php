<?php
    include_once "inc/prelude.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pharmabase :: New Drug</title>
    <?php include "inc/resources.php" ?>
</head>
<body>
    <div class="wrapper">
        <header>
            <h1>Pharmabase</h1>
            <?php breadcrumb("New Drug") ?>
        </header>

        <form action="doNewDrug.php" method="POST">
            Name: <input type="text" name="name"><br />
            Price: <input type="number" name="price" min="0" step="0.01"><br />
            Substance: <input type="text" name="substance"><br />
            Generic?: <input type="checkbox" name="generic" value="TRUE"><br />
            <input type="submit" value="Submit">
        </form>

    </div>
</body>
</html>