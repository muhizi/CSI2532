<?php
    include_once "inc/prelude.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pharmabase :: New Patient</title>
    <?php include "inc/resources.php" ?>
</head>
<body>
    <div class="wrapper">
        <header>
            <h1>Pharmabase</h1>
            <?php breadcrumb("New Patient") ?>
        </header>

        <form action="doNewPatient.php" method="POST">
            First name: <input type="text" name="firstName"><br />
            Last name: <input type="text" name="lastName"><br />
            Birth date: <input type="text" class="datepicker" name="birthDate"><br />
            Address: <input type="text" name="address"><br />
            Tel: <input type="text" name="tel"><br />
            Sex: <?php sexSelect(); ?><br />
            SSN: <input type="text" name="ssn"><br />
            <input type="submit" value="Submit">
        </form>

    </div>
</body>
</html>