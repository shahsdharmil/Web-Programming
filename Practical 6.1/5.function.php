<?php
function printMatrix($matrix){
    foreach ($matrix as $row) {
        echo implode(" ", $row) . "<br />";
     } 
}
echo "<h4>User function.</h4>";

$matrix1 = array(
    array(1, 2, 3),
    array(4, 5, 6),
    array(7, 8, 9)
);

echo "Print Array with custom function <br />";
printMatrix($matrix1);
?>
