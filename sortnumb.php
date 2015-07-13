<!-- reads the file "result.txt" created in distinctnumb.php script 
and outputs the minimum and maximum numbers, sorts the list 
and then saves it in a file called "sorted.txt". -->

<?php
$fileContents = explode("\n", file_get_contents('results.txt'));
// A function that returns the lowest integer that is not 0.
/* like min(), but casts to int and ignores 0, although given the 
distinctnumb.php  script there will never be any 0 array values*/
function min_not_null(Array $values) {
    return min(array_diff(array_map('intval', $values), array(0)));
}
$minnumb= min_not_null($fileContents);
echo "Minimum value = " .$minnumb . " and ";
echo "Maximum value = " .max($fileContents);

$file = fopen('sorted.txt', 'w') or die("Unable to open file");
sort($fileContents);
foreach ($fileContents as $fileContent)
{
  fwrite($file, $fileContent . "\n");
}
fclose($file);
?>