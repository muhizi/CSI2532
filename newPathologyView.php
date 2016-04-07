<?php
    include_once "inc/prelude.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pharmabase :: New Pathology</title>
    <?php include "inc/resources.php" ?>
</head>
<body>
    <div class="wrapper">
        <header>
            <h1>Pharmabase</h1>
        </header>

        <form action="doNewPathology.php" method="POST">
            Name: <input type="text" name="name"><br />
            <input type="submit" value="Submit">
        </form>

    </div>
</body>
</html>