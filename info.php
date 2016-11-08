<?php

phpinfo();
// Connects to the XE service (i.e. database) on the "localhost" machine
$conn = oci_connect('consultorio', 'consultorio777.', 'localhost/XE');
if (!$conn) {
    echo "error conexion";
}

$stid = oci_parse($conn, 'SELECT * FROM test_tab');
oci_execute($stid);

echo "<table border='1'>\n";
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    echo "</tr>\n";
}
echo "</table>\n";
echo "fin de la prueba"
?> 
