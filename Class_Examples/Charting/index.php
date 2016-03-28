<?php

  /**
   * Author: H. James de St. Germain
   * Date: Spring 2016
   *
   *  Sample code for charting
   *
   */


$server_name  = 'localhost';
$db_user_name = 'charter';
$db_password  = 'charter';
$db_name      = 'Charting';


try
{
  //
  // The main content of the page will be in this variable
  //
  $output = "";
  
  //
  // Connect to the data base and select it.
  //
  $db = new PDO("mysql:host=$server_name;dbname=$db_name;charset=utf8", $db_user_name, $db_password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


  $query =     " SELECT * FROM student_data ";

  $statement = $db->prepare( $query );
  $statement->execute(  );
      
  //
  // Fetch all the results
  //
  $results    = $statement->fetchAll(PDO::FETCH_ASSOC);

  //
  // Build Pie Chart Data
  //
  $histogram  = [];
  $CATS = 20;

  for ($category=0;$category<$CATS;$category++)
    {
      $data = new stdClass();
      $data->name = "" . $category*10 . "-" . ($category*10+10);
      $data->y = 0;
      $histogram []= $data;
    }

  for ($i=0;$i<count($results);$i++)
    {
      $index = floor((float)($results[$i]['Credits'])/$CATS);
      if ($index >= $CATS)
	{
	  $index = $CATS-1;
	}
      $histogram[$index]->y++;

    }

  $data = "[";

  for ($category=0;$category<$CATS;$category++)
    {
      $data .= json_encode($histogram[$category]) . ",";
    }
  $data .= "]";

  //
  // Build Line Chart Data
  //

  $line_chart_data = new stdClass();
  $line_chart_data->name = "GPAS";
  $line_chart_data->data = [];

  for ($i=0;$i<count($results);$i++)
    {
      $line_chart_data->data [] = (float)$results[$i]['Overall'];
    }

  sort( $line_chart_data->data );

  $line_chart_data = json_encode($line_chart_data);

}
catch (PDOException $ex)
{
  $output .= "<p>oops</p>";
  $output .= "<p> Code: {$ex->getCode()} </p>";
  $output .=" <p> See: dev.mysql.com/doc/refman/5.0/en/error-messages-server.html#error_er_dup_key";
  $output .= "<pre>$ex</pre>";

}

//
// Below is the HTML content
//

echo <<<END

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"/>
    <meta name="author" content="H. James de St. Germain"/>

    <script type="text/javascript" src="HighCharts/api/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="HighCharts/js/highcharts.src.js"></script>

    <title> Charting</title>
  </head>
  
  <body>

    <h1> Welcome to the Charting Example </h1>

    <div id="piechart" style="height:500px"></div>

    <div id="linechart" style="height:500px"></div>

  <script>
  
  $('#piechart').highcharts({
      chart: {
	plotBackgroundColor: null,
	  plotBorderWidth: null,
	  plotShadow: false,
	  type: 'pie'
	  },
	title: {
	text: 'Student Credit Hour Distribution'
	  },
	tooltip: {
	pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
	  },
	plotOptions: {
	pie: {
	  allowPointSelect: true,
	    cursor: 'pointer',
	    dataLabels: {
	    enabled: true,
	      format: '<b>{point.name} </b>: {point.percentage:.1f} %',
	      style: {
	      color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
		}
	  }
	}
      },
	series: [{
	  name: 'Percentage',
	    colorByPoint: true,
	    data: $data
	    }]
	});




$('#linechart').highcharts({
    chart: { type:'column'},
    title: {
      text: 'GPAs',
	x: -20 //center
        },
      subtitle: {
      text: 'Source: Jim',
	x: -20
        },
      xAxis: {
      title: 'credit_hours',
        },
      yAxis: {
      min:0,max:4,
      title: {
	text: 'GPA'
	  },
	plotLines: [{
	  value: 0,
	    width: 1,
	    color: '#808080'
            }]
        },
      legend: {
      layout: 'vertical',
	align: 'right',
	verticalAlign: 'middle',
	borderWidth: 0
        },
      series: [ $line_chart_data ]
      });

</script>

END;


