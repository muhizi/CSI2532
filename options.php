<?php include_once 'inc/prelude.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pharmabase :: Options</title>
    <?php include "inc/resources.php" ?>
</head>
<body>
    <div class="wrapper">
        <header>
            <h1>Pharmabase</h1>
            <?php breadcrumb("Options") ?>
        </header>

        <?php flash() ?>

        <div class="menu">
            <div><a href="inc/makedb.php">Regenerate database</a></div>
            <div><a href="inc/sampledata.php">Load sample data</a></div>
        </div>
    </div>
</body>
</html>