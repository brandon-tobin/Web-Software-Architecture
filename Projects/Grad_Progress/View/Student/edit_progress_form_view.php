<?php
/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * Progress Form View -- View for editing student forms
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

                <!-- Edit Due Process Form for $form->student_Name  -->

                <title>Due Process Form</title>

                <!-- Meta Information about Page -->
                <meta charset=\"utf-8\"/>
                <meta name=\"AUTHOR\"      content=\"Brndon Tobin\"/>
                <meta name=\"keywords\"    content=\"HTML, Projects\"/>
                <meta name=\"description\" content=\"Edit due Process Form for $form->student_Name\"/>

                <!-- ALL CSS FILES -->
                <!--<link rel=\"stylesheet\" href=\"../../../../Resources/css/stylesheet.css\" type=\"text/css\"/> -->
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
                    echo "
                        <!-- Breadcrumb -->
                        <ol class=\"breadcrumb\">
                            <li><a href=\"../Account/account_home.php\">Account Home</a></li>
                            <li><a href=\"../DGS/overview.php\">DGS Overview</a></li>
                            <li><a href=\"../Advisor/students.php?id=".$_SESSION['advisor']."\">Graduate Students</a></li>
                            <li><a href=\"../Student/student_forms.php?id=".$_SESSION['student']."\">$form->student_Name's Forms</a></li>
                            <li class=\"active\">Edit Process Form</li>
                        </ol>";
                }
                else if (in_array('faculty', $_SESSION['roles']))
                {
                    echo "
                    <!-- Breadcrumb -->
                    <ol class=\"breadcrumb\">
                        <li><a href=\"../Account/account_home.php\">Account Home</a></li>
                        <li><a href=\"../Advisor/students.php?id=".$_SESSION['userid']."\">My Graduate Students</a></li>
                        <li><a href=\"../Student/student_forms.php?id=".$_SESSION['student']."\">$form->student_Name's Forms</a></li>
                        <li class=\"active\">Edit Process Form</li>
                    </ol>";
                }
                else if (in_array('student', $_SESSION['roles']))
                {
                    echo "
                    <!-- Breadcrumb -->
                    <ol class=\"breadcrumb\">
                        <li><a href=\"../Account/account_home.php\">Account Home</a></li>
                        <li><a href=\"../Student/student_forms.php?id=".$_SESSION['userid']."\">My Forms</a></li>
                        <li class=\"active\">Edit Process Form</li>
                    </ol>";
                }

                echo (pageDataHeader("Due Progress Advisory Document for Ph.D. Degree"));

                 echo "

                <!-- Due Progress Form -->
                <p><b>Date:</b> <u>$form->date_completed</u></p>
                <p><b>Student Name:</b><u>$form->student_Name</u> <b>Student ID #</b> <u>$form->student_ID</u></p>
                <p><b>Degree:</b> <u>$form->degree</u> <b>Track:</b> <u>$form->track</u></p>
                <p><b>Date Admitted:</b> <u>$form->semester_Admitted</u> <b># of semesters in the program</b> <u>$form->num_semesters</u></p>
                <p><b>Advisor:</b> <u>$form->advisor</u></p>
                <p><b>Committee:</b></p>
                <ul>";

                // Echo out the committee members
                foreach ($form->committee as $row)
                {
                    echo "<li>$row</li>";
                }

                echo "</ul>

                <br />

                <form method=\"post\">

                <div class=\"table-responsive\">
                    <table class=\"table table-striped table-bordered table-condensed\">
                        <tr>
                            <th>Activity</th>
                            <th>Number of Semesters</th>
                            <th>Good / Acceptable</th>
                            <th>Completed Semester</th>
                        </tr>";

                                // Echo out all activities for the form
                                echo "<tr>
                                <td>Identify Advisor</td>
                                <td>$form->number_semesters1</td>
                                <td>$form->acceptable1</td>
                                <td><input type=\"text\" name=\"updated_date1\" value=\"$form->completed_activity1\" /></td>
                            </tr>
                            <tr>
                                <td>Program of study approved by advisor and initial committee</td>
                                <td>$form->number_semesters2</td>
                                <td>$form->acceptable2</td>
                                <td><input type=\"text\" name=\"updated_date2\" value=\"$form->completed_activity2\" /></td>
                            </tr>
                            <tr>
                                <td>Complete teaching mentorship</td>
                                <td>$form->number_semesters3</td>
                                <td>$form->acceptable3</td>
                                <td><input type=\"text\" name=\"updated_date3\" value=\"$form->completed_activity3\" /></td>
                            </tr>
                            <tr>
                                <td>Complete required courses</td>
                                <td>$form->number_semesters4</td>
                                <td>$form->acceptable4</td>
                                <td><input type=\"text\" name=\"updated_date4\" value=\"$form->completed_activity4\" /></td>
                            </tr>
                            <tr>
                                <td>Full committee formed</td>
                                <td>$form->number_semesters5</td>
                                <td>$form->acceptable5</td>
                                <td><input type=\"text\" name=\"updated_date5\" value=\"$form->completed_activity5\" /></td>
                            </tr>
                            <tr>
                                <td>Program of Study approved by committee</td>
                                <td>$form->number_semesters6</td>
                                <td>$form->acceptable6</td>
                                <td><input type=\"text\" name=\"updated_date6\" value=\"$form->completed_activity6\" /></td>
                            </tr>
                            <tr>
                                <td>Written qualifier</td>
                                <td>$form->number_semesters7</td>
                                <td>$form->acceptable7</td>
                                <td><input type=\"text\" name=\"updated_date7\" value=\"$form->completed_activity7\" /></td>
                            </tr>
                            <tr>
                                <td>Oral qualifier/Proposal</td>
                                <td>$form->number_semesters8</td>
                                <td>$form->acceptable8</td>
                                <td><input type=\"text\" name=\"updated_date8\" value=\"$form->completed_activity8\" /></td>
                            </tr>
                            <tr>
                                <td>Dissertation defense</td>
                                <td>$form->number_semesters9</td>
                                <td>$form->acceptable9</td>
                                <td><input type=\"text\" name=\"updated_date9\" value=\"$form->completed_activity9\" /></td>
                            </tr>";



                    echo "

                    </table>
                </div>

                <ol>
                    <li>Has the student met due progress requirements?";
                    if ($form->question1 == 1)
                        echo "<input type=\"radio\" name=\"requirements_met\" value=\"0\" >No <input type=\"radio\" name=\"requirements_met\" value=\"1\" checked>Yes</li>";
                    else
                        echo "<input type=\"radio\" name=\"requirements_met\" value=\"0\" checked>No <input type=\"radio\" name=\"requirements_met\" value=\"1\">Yes</li>";
                    echo "
                    <li>Describe the progress the student has made during the past year.</li>
                    <TEXTAREA NAME=\"comments\" COLS=40 ROWS=6>$form->question2</TEXTAREA>

                </ol>

                <pre><u>      $form->student_Name               </u>Student Signature  <u>     $form->date_completed      </u> Date</pre>

                <pre><u>      $form->advisor                    </u>Advisor Signature  <u>     $form->date_completed      </u> Date</pre>

                <button class=\"btn btn-primary\" type=\"submit\" name=\"submit\" value=\"Submit\">
                    Submit
                    <span class=\"glyphicon glyphicon-ok\" aria-hidden=\"true\"></span>
                </button>";

            echo (getFooter());

            echo "

            </div> <!-- Ending column -->
            <div class=\"col-sm-0 col-md-1 col-lg-2\"></div>
        </div> <!-- Ending Row -->

             </body>

             </form>

    </html>

";

?>
