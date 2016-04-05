<?php
function datatable($keys) {
    echo "<table><thead><tr>";
    foreach ($keys as $key) {
        echo "<td>", $key, "</td>";
    }
    echo "</tr></thead>";
}

function endDatatable() {
    echo "</table>";
}

function row($r) {
    echo "<tr>";
    foreach($r as $v) {
        echo "<td>", $v, "</td>";
    }
    echo "</tr>";
}
?>