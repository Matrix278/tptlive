<meta http-equiv="refresh" content="5">
<?php
include "library.php";
/*
dd/mm/yy name/type/price
*/
$newD=rand(1,30);
$newM=rand(1,12);
/*
if(a>5){b=10;}else{b=0}
b={a>5?10:0}
*/
$newData = ($newD >9?$newD:'0'.$newD)."/".($newM >9?$newM:'0'.$newM).'/2017 '.$places[rand(0, count($places)-1)].'/'.$types[rand(0, count($types)-1)].'/'.(rand(500, 1500)/100).'€'."\r\n";
$listFile=fopen('list.txt', 'a');
fwrite($listFile, $newData);
fclose($listFile);
?>