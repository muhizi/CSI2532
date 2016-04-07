<?php
    include_once "inc/prelude.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pharmabase :: New Secretary</title>
    <?php include "inc/resources.php" ?>
</head>
<body>
    <div class="wrapper">
        <header>
            <h1>Pharmabase</h1>
            <?php breadcrumb("New Doctor") ?>
        </header>

        <form action="doNewDoctor.php" method="POST">
            First name: <input type="text" name="firstName"><br />
            Last name: <input type="text" name="lastName"><br />
            Address: <input type="text" name="address"><br />
            Tel: <input type="text" name="tel"><br />
            Specialty: <input type="text" name="specialty"><br />
            Secretary: <?php secretarySelect(); ?>
            <input type="submit" value="Submit">
        </form>

    </div>
</body>
</html>