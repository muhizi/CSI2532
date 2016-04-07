<?php
    include_once "inc/prelude.php";

    connectDB();

    $sql = "select * from pharmacy.Pathology where id = $1";
    $ret = pg_query_params($db, $sql, [$_GET["id"]]);
    closeDB();
    if (!$ret) {
        setFlash("This isn't the pathology you're looking for.");
        header("Location: pathology.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pharmabase :: Edit Pathology</title>
    <?php include "inc/resources.php" ?>
</head>
<body>
    <div class="wrapper">
        <header>
            <h1>Pharmabase</h1>
            <?php breadcrumb("Edit Pathology") ?>
        </header>

        <?php
            $r = pg_fetch_row($ret);

            ?><form action="doEditPathology.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $r[0] ?>"><br />
                Name: <input type="text" name="name" value="<?php echo $r[1] ?>"><br />
                <input type="submit" value="Submit">
            </form> <?php
        ?>
    </div>
</body>
</html>