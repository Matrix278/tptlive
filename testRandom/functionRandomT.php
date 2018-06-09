<style>
.tablePlace{ display: inline-block; vertical-align: top; width: auto; height: auto; margin: 20px;}
</style>
<?php
function randomTest($nSerii, $Dmin, $Dmax, $N){
  if(isset($Dmin) && isset($Dmax) && isset($N)){
    $resArray=Array();
    for ($i=$Dmin; $i <= $Dmax; $i++) {
      $resArray[strval($i)]=0;
    }

    echo '<div class="tablePlace">
    <h2>Таблица 1.</h2>';
    echo '<table border="1">';
    echo '<tr>
    <th>Номер серии</th>
    <th>Номер попытки</th>
    <th>N</th>
    <th>Dmin</th>
    <th>Dmax</th>
    <th>Res</th>
    </tr>';
    for ($i=0; $i < $N; $i++) {
      $newValue=rand($Dmin,$Dmax);
      echo '<tr>
      <td>'.$nSerii.'</td>
      <td>'.($i+1).'</td>
      <td>'.$N.'</td>
      <td>'.$Dmin.'</td>
      <td>'.$Dmax.'</td>
      <td>'.$newValue.'<br /></td>
      </tr>';
      $resArray[strval($newValue)]++;
    }
    echo '</table></div>';
    echo '<div class="tablePlace">
    <h2>Таблица 2.</h2>';
    echo '<table border="1">';
    echo '<tr>
    <th>Номер серии</th>
    <th>Вариант значение</th>
    <th>Количество появления</th>
    </tr>';
    foreach ($resArray as $rAKey => $rAValue) {
      echo '<tr>
      <td>1.</td>
      <td>'.$rAKey.'</td>
      <td>'.$rAValue.'</td>
      </tr>';
    }
    echo '</table></div>';
  }
}
?>
