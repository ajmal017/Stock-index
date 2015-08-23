<script type="text/javascript" src="https://www.google.com/jsapi"></script>
  
<br>
  <script type="text/javascript">
    google.load('visualization', '1.1', {packages: ['line']});
    google.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Day');
      data.addColumn('number', 'Energy Index(%)');
     
      
      data.addRows([
        <?=$stockIndex?>

      ]);
      
      var options = {
        chart: {
          title: 'Energy Stock Index',
          subtitle: 'in USD'
        },
        width: 900,
        height: 500
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
      data.addColumn('number', 'Energy Index(%)');
      data.addColumn('number', '12-Day EMA');  
      data.addColumn('number', '26-Day EMA');   
      
      data.addRows([
        <?=$stockTwelveTwentySix?>

      ]);
      
      var options = {
        chart: {
          title: 'Energy Stock Index w/12-day and 26-day EMA',
          subtitle: 'in USD'
        },
        width: 900,
        height: 500
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
      data.addColumn('number', 'Energy Index(%)');
      data.addColumn('number', '12-Day EMA');    
      
      data.addRows([
        <?=$stockTwelve?>

      ]);
      
      var options = {
        chart: {
          title: 'Energy Stock Index w/12-day EMA',
          subtitle: 'in USD'
        },
        width: 900,
        height: 500
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
      data.addColumn('number', 'Energy Index(%)');
      data.addColumn('number', 'Lower BB');
      data.addColumn('number', 'Upper BB');    
      
      data.addRows([
        <?= $bb ?>

      ]);
      
      var options = {
        chart: {
          title: 'Energy Stock Index w/Bollinger Point Comparisons',
          subtitle: 'in USD'
        },
        width: 900,
        height: 500
      };

      var chart = new google.charts.Line(document.getElementById('Bollinger'));

      chart.draw(data, options);
    }
  </script>

  <div id="stocks"></div>

<br>
  <div id="twelvetwentyday"></div>
<br>
  <div id="twelvetwentysixday"></div>
<br>
  <div id="Bollinger"></div>
