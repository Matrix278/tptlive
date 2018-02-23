<?php
require_once "dbconnect.php";
function testIt($testVariant, $paramName, $tableName){
  global $link;
  //---------------- применение ----------------
  //---------------- usage -------------------
  // if(testIt('ru', 'code,', 'vn_languages')){положительный}else{отрицательный}
  // if(testIt('2018-02-22', 'date', 'vn_news')){положительный}else{отрицательный}
  if(!empty($testVariant) && !empty($paramName) && !empty($tableName)){
    $variantsTable=mysqli_query($link,"SELECT $paramName FROM $tableName");
    $testRes=FALSE;
    while($oneVariant=mysqli_fetch_assoc($variantsTable)){
      if($oneVariant[$paramName]==$testVariant){
        $testRes=TRUE;
      }
    }
    return $testRes;
  }else{
    return FALSE;
  }
}


if(testIt('ru', 'code', 'vn_languages')){
  echo 'такой вариант есть';
}else{
  echo 'такого варианта нету';
}
?>
