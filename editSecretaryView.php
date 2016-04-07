<?php
    include_once "inc/prelude.php";

    connectDB();

    $sql = "select * from pharmacy.Secretary where id = $1";
    $ret = pg_query_params($db, $sql, [$_GET["id"]]);
    closeDB();
    if (!$ret) {
        setFlash("This isn't the secretary you're looking for.");
        header("Location: secretaries.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pharmabase :: Edit Secretary</title>
    <?php include "inc/resources.php" ?>
</head>
<body>
    <div class="wrapper">
        <header>
            <h1>Pharmabase</h1>
            <?php breadcrumb("Edit Secretary") ?>
        </header>

        <?php
            $r = pg_fetch_row($ret);

            ?><form action="doEditSecretary.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $r[0] ?>"><br />
                First name: <input type="text" name="firstName" value="<?php echo $r[1] ?>"><br />
                Last name: <input type="text" name="lastName" value="<?php echo $r[2] ?>"><br />
                Address: <input type="text" name="address" value="<?php echo $r[3] ?>"><br />
                Tel: <input type="text" name="tel" value="<?php echo $r[4] ?>"><br />
                <input type="submit" value="Submit">
            </form> <?php
        ?>

    </div>
</body>
</html>