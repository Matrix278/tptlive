<?php
require 'functionRandomT.php';

$fileName="random.txt";
$file=fopen($fileName, "r");
$fileContent=fread($file, 8192);
$explode=explode("\r\n", $fileContent);
for ($i=0; $i < $explode[$i]; $i++) {
  //echo $explode[$i]."<br>";
  $explodeNumber=explode(" ", $explode[$i]);
  //randomTest($nSerii, $Dmin, $Dmax, $N)

  /*echo "<br>";
  echo "nSerii: ".$explodeNumber[0]."<br>";
  echo "Dmin: ".$explodeNumber[1]."<br>";
  echo "Dmax: ".$explodeNumber[2]."<br>";
  echo "N: ".$explodeNumber[3]."<br>";
  */

  echo "<br>";
  echo randomTest($explodeNumber[0], $explodeNumber[1], $explodeNumber[2], $explodeNumber[3])."<br><hr>";
}
fclose($file);
?>
