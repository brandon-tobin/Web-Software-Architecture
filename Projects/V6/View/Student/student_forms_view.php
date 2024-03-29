<?php
/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * Student Forms View -- View to display list of forms for student
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

                <!-- This is a list page of forms for $student->student_First_Name  -->


                <title>$student->student_First_Name's Forms</title>

                <!-- Meta Information about Page -->
                <meta charset=\"utf-8\"/>
                <meta name=\"AUTHOR\"      content=\"Brndon Tobin\"/>
                <meta name=\"keywords\"    content=\"HTML, Projects\"/>
                <meta name=\"description\" content=\"$student->student_First_Name's page of forms\"/>

                <!-- ALL CSS FILES -->
                <!--<link rel=\"stylesheet\" href=\"../../../../Resources/css/stylesheet.css\" type=\"text/css\"/>-->
                <!-- Bootstrap Core CSS -->
                <link href=\"../../../../Resources/Bootstrap/bootstrap-3.3.6-dist/css/bootstrap.css\" rel=\"stylesheet\">

            </head>

            <body>

            <div class=\"container-fluid\">
                <div class=\"row\">
                    <div class=\"col-sm-0 col-md-1 col-lg-2\"></div>
                    <div class=\"col-sm-12 col-md-10 col-lg-8\">";

                echo (getHeader());

                echo (getNavigation());

                echo (getNavBar($_SESSION['roles']));

                if (in_array('dgs', $_SESSION['roles']))
                {
                    $_SESSION['student'] = $student->student_ID;
                    echo "
                    <!-- Breadcrumb -->
                    <ol class=\"breadcrumb\">
                        <li><a href=\"../Account/account_home.php\">Account Home</a></li>
                        <li><a href=\"../DGS/overview.php\">DGS Overview</a></li>
                        <li><a href=\"../Advisor/students.php?id=".$_SESSION['advisor']."\">Graduate Students</a></li>
                        <li class=\"active\">$student->student_First_Name's Forms</li>
                    </ol>";
                }
                else if (in_array('faculty', $_SESSION['roles']))
                {
                    $_SESSION['student'] = $student->student_ID;
                    echo "
                    <!-- Breadcrumb -->
                    <ol class=\"breadcrumb\">
                        <li><a href=\"../Account/account_home.php\">Account Home</a></li>
                        <li><a href=\"../Advisor/students.php?id=".$_SESSION['userid']."\">My Graduate Students</a></li>
                        <li class=\"active\">$student->student_First_Name's Forms</li>
                    </ol>";
                }
                else if (in_array('student', $_SESSION['roles']))
                {
                    echo "
                    <!-- Breadcrumb -->
                    <ol class=\"breadcrumb\">
                        <li><a href=\"../Account/account_home.php\">Account Home</a></li>
                        <li class=\"active\">My Forms</li>
                    </ol>";
                }

                echo (pageDataHeader("$student->student_First_Name's Forms"));

                echo "

                <!-- Table containing $student->student_First_Name's forms -->
                <div class=\"table-responsive\">
                    <table class=\"table table-striped table-bordered table-condensed\">
                        <tr>
                            <th>Date Created:</th>
                            <th>Date Last Modified:</th>
                            <th>Compliance:</th>
                            <th>Form:</th>
                            <th>Edit Form:</th>
                        </tr>";
                    // Echo out all entries in student array
                    foreach ($student->form_Records_Array as $row)
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

                <a class=\"btn btn-success btn-lg\" href='new_progress_form.php?id=$student->student_ID' role=\"button\" >
                Create Form
                <span class=\"glyphicon glyphicon-list\" aria-hidden=\"true\"></span>
                </a>";

            echo "

            </div> <!-- Ending column -->
            <div class=\"col-sm-0 col-md-1 col-lg-2\"></div>
        </div> <!-- Ending Row -->
        </div>



        <!-- jQuery -->
        <script src=\"../../../Resources/Bootstrap/bootstrap-3.3.6-dist/js/jquery.js\"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src=\"../../../Resources/Bootstrap/bootstrap-3.3.6-dist/js/bootstrap.min.js\"></script>
            </body>

        </html>
";

?>


