<?php
    include_once "inc/prelude.php";

    connectDB();

    $sql = "select * from pharmacy.Drug where id = $1";
    $ret = pg_query_params($db, $sql, [$_GET["id"]]);
    closeDB();
    if (!$ret) {
        setFlash("This isn't the drug you're looking for.");
        header("Location: drug.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pharmabase :: Edit Drug</title>
    <?php include "inc/resources.php" ?>
</head>
<body>
    <div class="wrapper">
        <header>
            <h1>Pharmabase</h1>
            <?php breadcrumb("Edit Drug") ?>
        </header>

        <?php
            $r = pg_fetch_row($ret);

            ?><form action="doEditDrug.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $r[0] ?>"><br />
                Name: <input type="text" name="name" value="<?php echo $r[1] ?>"><br />
                Price: <input type="number" name="price" min="0" step="0.01" value="<?php echo $r[2]; ?>"><br />
                Substance: <input type="text" name="substance" value="<?php echo $r[3] ?>"><br />
                <?php $checked = ""; if ($r[4] == "t") { $checked = "checked"; } ?>
                Generic?: <input type="checkbox" name="generic" <?php echo $checked; ?>><br />
                <input type="submit" value="Submit">
            </form> <?php
        ?>
    </div>
</body>
</html>