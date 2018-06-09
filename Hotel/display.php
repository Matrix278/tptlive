<meta http-equiv="refresh" content="5">
<table border="1">
<?php
$listF =  fopen("list.txt", "r");
while(!feof($listF)){
    $oneString = fgets($listF, 4086);
    $spaceIndex = mb_strpos($oneString, ' ');
    $newDate = mb_substr($oneString, ($spaceIndex-10),10);
    if($spaceIndex-10>1){
        $newType=mb_substr($oneString, 0, 2);}
        $tempArray=explode('/', mb_substr($oneString, $spaceIndex + 1));
        if($spaceIndex!==false){
        if(count($tempArray)==2){
            $newName=$tempArray[0];
            $newPrice=$tempArray[1];
        }else{
            $newName=$tempArray[0];
            $newType=$tempArray[1];
            $newPrice=$tempArray[2];
        }
  echo "<tr>
        <td>$newName</td>
        <td>$newType</td>
        <td>$newDate</td>
        <td>$newPrice</td>
        </tr>";
        }
}
fclose($listF);

?>
</table>