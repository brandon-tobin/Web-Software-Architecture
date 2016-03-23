<?php
/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * Overview View
 *
 */

require('../../View/Partials/partial_view.php');

echo "
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\" \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">

    <html lang=\"en\">
        <head>

        <!-- Last Updated Spring 2016 -->
        <!-- Brandon Tobin -->
        <!-- University of Utah -->

        <!-- This page contains a list of all advisors and students for the DGS -->


        <title>DGS Overview</title>

        <!-- Meta Information about Page -->
        <meta charset=\"utf-8\"/>
        <meta name=\"AUTHOR\"      content=\"Brndon Tobin\"/>
        <meta name=\"keywords\"    content=\"HTML, Projects\"/>
        <meta name=\"description\" content=\"List of advisors and students for the DGS\"/>

        <!-- ALL CSS FILES -->
        <!--<link rel=\"stylesheet\" href=\"../../../../Resources/css/stylesheet.css\" type=\"text/css\"/>-->
        <!-- Bootstrap Core CSS -->
        <link href=\"../../../../Resources/Bootstrap/bootstrap-3.3.6-dist/css/bootstrap.css\" rel=\"stylesheet\">

        <script src=\"//code.jquery.com/jquery-1.9.1.js\"></script>
        <script src=\"../../../../Resources/get_data.js\"></script>

        <script type=\"text/javascript\" src=\"../../../../Resources/Highcharts/api/js/jquery-1.11.3.min.js\"></script>
        <script type=\"text/javascript\" src=\"../../../../Resources/Highcharts/js/highcharts.src.js\"></script>

        </head>

        <body>

        <div class=\"container-fluid\">
            <div class=\"row\">
                <div class=\"col-sm-0 col-md-1 col-lg-2\"></div>
                <div class=\"col-sm-12 col-md-10 col-lg-8\">

";


        echo (getHeader());

        echo (getNavigation());

        echo (getNavBar($_SESSION['roles']));

        echo "

            <!-- Breadcrumb -->
            <ol class=\"breadcrumb\">
                <li><a href=\"../Account/account_home.php\">Account Home</a></li>
                <li class=\"active\">DGS Overview</li>
            </ol>

            <h1>Statistical Charts</h1>

             <form method=\"post\" id=\"form_id\" onchange=\"return find_data()\">
                <select name=\"formlist\" id=\"formlist\">
                  <option value=\"gpa\" selected>Current Student GPAs</option>
                  <option value=\"advisor\">Advised Students Per Advisor</option>
                  <!--<option value=\"opel\">Opel</option>
                  <option value=\"audi\">Audi</option>-->
                </select>

             </form>

             <div id=\"linechart\" style=\"height:500px\"></div>


             <div id=\"content\"></div>

             <script>

             $('#linechart').highcharts({
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
	    data: [{\"name\":\"0-10\",\"y\":151},{\"name\":\"10-20\",\"y\":422},{\"name\":\"20-30\",\"y\":615},{\"name\":\"30-40\",\"y\":640},{\"name\":\"40-50\",\"y\":654},{\"name\":\"50-60\",\"y\":812},{\"name\":\"60-70\",\"y\":1113},{\"name\":\"70-80\",\"y\":1281},{\"name\":\"80-90\",\"y\":1024},{\"name\":\"90-100\",\"y\":685},{\"name\":\"100-110\",\"y\":390},{\"name\":\"110-120\",\"y\":211},{\"name\":\"120-130\",\"y\":109},{\"name\":\"130-140\",\"y\":66},{\"name\":\"140-150\",\"y\":36},{\"name\":\"150-160\",\"y\":20},{\"name\":\"160-170\",\"y\":12},{\"name\":\"170-180\",\"y\":11},{\"name\":\"180-190\",\"y\":7},{\"name\":\"190-200\",\"y\":37},]
	    }]
	});


        </script>









            <h1>Graduate Advisors</h1>

            <!-- Table containing advisors -->
            <div class=\"table-responsive\">
                <table class=\"table table-striped table-bordered table-condensed\">
                    <tr>
                        <th>Name:</th>
                        <th>Profile:</th>
                    </tr>";

                    // Echo out all advisors
                    foreach ($dgs->advisors as $row)
                    {
                        echo "<tr>";
                        foreach ($row as $value)
                        {
                            echo "<td>$value</td>";
                        }
                        echo "</tr>";
                    }

                    echo "

                </table>
            </div>

            <h1>Graduate Students</h1>

            <!-- Table containing advisors -->
            <div class=\"table-responsive\">
                <table class=\"table table-striped table-bordered table-condensed\">
                    <tr>
                        <th>Name:</th>
                        <th>Profile:</th>
                    </tr>";

                    // Echo out all Students
                    foreach ($dgs->students_arr as $row)
                    {
                        echo "<tr>";
                        foreach ($row as $value)
                        {
                            echo "<td>$value</td>";
                        }
                        echo "</tr>";
                    }

                    echo "

                </table>
            </div>";

        echo "

         </div> <!-- Ending column -->
         <div class=\"col-sm-0 col-md-1 col-lg-2\"></div>
    </div> <!-- Ending Row -->



        <!-- jQuery -->
        <script src=\"../../../Resources/Bootstrap/bootstrap-3.3.6-dist/js/jquery.js\"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src=\"../../../Resources/Bootstrap/bootstrap-3.3.6-dist/js/bootstrap.min.js\"></script>
        </body>

    </html>
";