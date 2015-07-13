<!-- generates 10 distinct random numbers from 1-100 and 
then saves them in a file called "result.txt" (one number per line). -->

<?php
function distinctRandomGen($min, $max, $qty) {
  $numbers = range($min, $max);
  shuffle($numbers);
  return array_slice($numbers, 0, $qty);
}

$file = fopen('results.txt', 'w') or die("Unable to open file");
foreach (distinctRandomGen(1, 100, 10) as $distinctNumb)
{
  fwrite($file, $distinctNumb . "\n");
}
fclose($file);
?>
