<?php
    function printMatrix($matrix){
        foreach ($matrix as $row) {
            echo implode(" ", $row) . "<br />";
         } 
    }
    echo "<h4>Transpose.</h4>";

    $matrix1 = array(
        array(1, 2, 3),
        array(4, 5, 6),
        array(7, 8, 9)
    );
    
    echo "Inital Array <br />";
    printMatrix($matrix1);

    $rows = count($matrix1);
    $cols = count($matrix1[0]);

    $transpose = array();

    for ($c = 0; $c < $cols; $c++) {
        $transpose_row = array();
        for ($r = 0; $r < $rows; $r++) {
            $transpose_row[] = $matrix1[$r][$c];
        }
        $transpose[] = $transpose_row;
    }

    echo "Final Array <br />";
    printMatrix($transpose);

    echo "<hr><h4>Multiplication of matrix.</h4>";

    $matrix2 = array(
        array(9, 8, 7),
        array(6, 5, 4),
        array(3, 2, 1)
    );

    $rows1 = count($matrix1);
    $cols1 = count($matrix1[0]);
    $rows2 = count($matrix2);
    $cols2 = count($matrix2[0]);

    $product = array();
    for ($r1 = 0; $r1 < $rows1; $r1++) {
        $product_row = array();
        for ($c2 = 0; $c2 < $cols2; $c2++) {
            $product_element = 0;
            for ($c1 = 0, $r2 = 0; $c1 < $cols1 && $r2 < $rows2; $c1++, $r2++) {
                $product_element += $matrix1[$r1][$c1] * $matrix2[$r2][$c2];
            }
            $product_row[] = $product_element;
        }
        $product[] = $product_row;
    }

    printMatrix($product);

    echo "<hr><h4>Addition of matrix.</h4>";

    $sum = array();

    for ($r = 0; $r < $rows1; $r++) {
        $sum_row = array();
        for ($c = 0; $c < $cols1; $c++) {
            $sum_row[] = $matrix1[$r][$c] + $matrix2[$r][$c];
        }
        $sum[] = $sum_row;
    }

    printMatrix($sum);
?>
