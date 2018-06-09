<html>
<head>
  <style>
  .tablePlace{ display: inline-block; vertical-align: top; width: auto; height: auto; margin: 20px;}
  </style>
  <title>Тестирование функции PHP/Random</title>
  <meta charset="utf-8" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js">
  </script>
</head>
<body>
  <form action="" method="get">
    Начало диапозона (целое число): <br />
    <input type="number" name="Dmin" value="<?php echo (isset($_GET['Dmin'])?$_GET['Dmin']:'0'); ?>" /><br />
    Конец диапозона (целое число): <br />
    <input type="number" name="Dmax" value="<?php echo (isset($_GET['Dmax'])?$_GET['Dmax']:'100'); ?>" /><br />
    Количество диапозона (целое число): <br />
    <input type="number" name="N" value="<?php echo (isset($_GET['N'])?$_GET['N']:'100'); ?>" /><br /><br />
    <input type="submit" name="" value="Старт" />
  </form>

  <?php
  if(isset($_GET['Dmin']) && isset($_GET['Dmax']) && isset($_GET['N'])){
    $resArray=Array();
    for ($i=$_GET['Dmin']; $i <= $_GET['Dmax']; $i++) {
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
    for ($i=0; $i < $_GET['N']; $i++) {
      $newValue=rand($_GET['Dmin'],$_GET['Dmax']);
      echo '<tr>
      <td>1</td>
      <td>'.($i+1).'</td>
      <td>'.$_GET['N'].'</td>
      <td>'.$_GET['Dmin'].'</td>
      <td>'.$_GET['Dmax'].'</td>
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
  ?>
  <canvas id="myChart"></canvas>
  <script>
  var ctx = document.getElementById('myChart').getContext('2d');
  var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'bar',

      // The data for our dataset
      data: {
          labels: [<?php foreach ($resArray as $rAKey => $rAValue) { echo $rAKey.","; ?>],
          datasets: [{
              label: "My First dataset",
              backgroundColor: 'rgb(255, 99, 132)',
              borderColor: 'rgb(255, 99, 132)',
		  data: [<?php echo $rAValue.","; }?>],
          }]
      },

      // Configuration options go here
      options: {}
  });
  </script>
</body>
</html>
