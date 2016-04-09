<?php
    include_once "inc/prelude.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pharmabase :: New Drug Script</title>
    <?php include "inc/resources.php" ?>
</head>
<body>
    <div class="wrapper">
        <header>
            <h1>Pharmabase</h1>
            <?php breadcrumb("New Drug Script") ?>
        </header>

        <form action="doNewDrugScript.php" method="POST">
            Drug: <?php drugSelect() ?><br />
            Doctor: <?php doctorSelect() ?><br />
            Patient: <?php patientSelect() ?><br />
            Date: <input type="text" class="datepicker" name="date"><br />
            Valid Days: <input type="number" name="validDays" value="30" /><br />
            <input type="submit" value="Submit">
        </form>

        <div class="conflicts">
        </div>
    </div>

    <script>
    $(function() {
        $("select[name='drug'], select[name='patient']").change(function() {
            updateConflicts();
        });
        updateConflicts();

        function updateConflicts() {
            var drug = $("select[name='drug']").val();
            var patient = $("select[name='patient']").val();
            $(".conflicts").load("inc/patientConflicts.php?drug=" + drug + "&patient=" + patient);
        }
    });
    </script>
</body>
</html>