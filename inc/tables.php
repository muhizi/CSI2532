<?php
function datatable($keys) {
    echo "<table class='datatable'><thead><tr>";
    foreach ($keys as $key) {
        echo "<td>", $key, "</td>";
    }
    echo "<td>Edit</td><td>Delete</td>";
    echo "</tr></thead><tbody>";
}

function endDatatable() {
    echo "</tbody></table>";
}

function row($r) {
    echo "<tr>";
    foreach($r as $v) {
        echo "<td>", $v, "</td>";
    }
    echo "</tr>";
}

function deleteCell($model, $id) {
    echo "<td><a href='doDelete", $model, ".php?id=", $id, "'><i class='fa fa-trash-o'></i></a></td>";
}

function editCell($model, $id) {
    echo "<td><a href='edit", $model, "View.php?id=", $id, "'><i class='fa fa-pencil'></i></a></td>";
}
?>