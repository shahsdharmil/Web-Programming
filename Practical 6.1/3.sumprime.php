<?php
echo "<h3>Sum of prime number of first 100 prime numbers are </h3>";
$sum =0;
for ($num = 2; $num <= 100; $num++) {
   $flag = 1;
   for ($i = 2; $i <= $num / 2; $i++) {
      if ($num % $i == 0) {
         $flag = 0;
         break;
      }
   }
   if ($flag == 1) {
      $sum=$sum+$num;
   }
}
echo $sum;
