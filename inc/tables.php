<?php
function datatable($keys) {
    echo "<table><thead><tr>";
    foreach ($keys as $key) {
        echo "<td>", $key, "</td>";
    }
    echo "</tr></thead>";

    // while($row = pg_fetch_row($sqlret)) {
    //     row($row);
    // }
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