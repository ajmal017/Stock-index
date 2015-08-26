<script type="text/javascript" src="https://www.google.com/jsapi"></script>
  
<br>
  <script type="text/javascript">
    google.load('visualization', '1.1', {packages: ['line']});
    google.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Day');
      data.addColumn('number', 'Stock Index(%)');
     
      
      data.addRows([
        <?=$stockIndex?>

      ]);
      
      var options = {
        chart: {
          title: 'Stock Index',
        },
        width: 1400,
        height: 1100
      };

      var chart = new google.charts.Line(document.getElementById('stocks'));

      chart.draw(data, options);
    }
  </script>


  
  <script type="text/javascript">
    google.load('visualization', '1.1', {packages: ['line']});
    google.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Day');
      data.addColumn('number', 'Stock Index(%)');
      data.addColumn('number', '12-Day EMA');  
      data.addColumn('number', '26-Day EMA');   
      
      data.addRows([
        <?=$stockTwelveTwentySix?>

      ]);
      
      var options = {
        chart: {
          title: 'Stock Index w/12-day and 26-day EMA',
        },
        width: 1400,
        height: 1100
      };

      var chart = new google.charts.Line(document.getElementById('twelvetwentysixday'));

      chart.draw(data, options);
    }
  </script>

  <script type="text/javascript">
    google.load('visualization', '1.1', {packages: ['line']});
    google.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Day');
      data.addColumn('number', 'Stock Index(%)');
      data.addColumn('number', '12-Day EMA');    
      
      data.addRows([
        <?=$stockTwelve?>

      ]);
      
      var options = {
        chart: {
          title: 'Stock Index w/12-day EMA',
        },
        width: 1400,
        height: 1100
      };

      var chart = new google.charts.Line(document.getElementById('twelvetwentyday'));

      chart.draw(data, options);
    }
  </script>

  <script type="text/javascript">
    google.load('visualization', '1.1', {packages: ['line']});
    google.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Day');
      data.addColumn('number', 'Stock Index(%)');
      data.addColumn('number', 'Lower BB');
      data.addColumn('number', 'Upper BB');    
      
      data.addRows([
        <?= $bb ?>

      ]);
      
      var options = {
        chart: {
          title: 'Stock Index w/Bollinger Band Comparisons',
        },
        width: 1400,
        height: 1100
      };

      var chart = new google.charts.Line(document.getElementById('Bollinger'));

      chart.draw(data, options);
    }

    
  </script>


<div id="exclusions">

<?php 
if($notExist!==NULL)
{
	echo('<p><span style="font-weight:bold">'.$notExist.'</span> does not return any results.  Please check spelling and date, then try again</p>');
}

if($notThroughout!==NULL)
{
	echo('<p><span style="font-weight:bold">'.$notThroughout.'</span> only returns partial results.  To ensure integrity of the index, these dates have been
	ignored.  Please verify stocks span entire range of selected dates </p>');
}
if($notThroughout===NULL && $notExist===NULL)
{
	echo('<h4 style="color:green"> All stocks are displayed');
}

?>
</div>


<br>
	<br>
    <div id="stocks"></div>
    <br>
    <div id="twelvetwentyday"></div>
    <br>
    <div id="twelvetwentysixday"></div>
    <br>
    <div id="Bollinger"></div>

