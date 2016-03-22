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
        <script src=\"get_data.js\"></script>

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

             <!--<form method=\"post\" id=\"form_id\" onsubmit=\"return find_data()\">
                <select name=\"formlist\" id=\"formlist\">
                  <option value=\"gpa\">Current Student GPAs</option>
                  <option value=\"advisor\">Advised Students Per Advisor</option>
                  <!--<option value=\"opel\">Opel</option>
                  <option value=\"audi\">Audi</option>-->
                <!--</select>

                	<input type=\"submit\" value=\"Submit\"/>

            </form>

             <div id=\"content\"></div>-->

             <form  id=\"form_id\"   onsubmit=\"return find_data()\">

	  <input type=\"checkbox\" name=\"cause_error\" value=\"true\"/>Cause an Error <br/>
	  <input type=\"checkbox\" name=\"before_send\" value=\"true\"/>Enable 'before send' alert <br/>
	  <input type=\"checkbox\" name=\"on_success\" value=\"true\"/>Enable 'on success' alert<br/>
	  <input type=\"checkbox\" name=\"show_origination\" value=\"true\"/>Show where we came from<br/>

	  <p>Message: <input type=\"text\" name=\"message\"> </p>

	  <input type=\"submit\" value=\"Submit\"/>

	</form>

      <div id=\"content\"></div>

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