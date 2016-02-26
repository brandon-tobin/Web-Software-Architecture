<?php
/**
* Author: Brandon Tobin
* Date: Spring 2016
*
* Progress Form View -- View for displaying the student's form
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

                <!-- Due Process Form for $form->student_Name  -->

                <title>Due Process Form</title>

                <!-- Meta Information about Page -->
                <meta charset=\"utf-8\"/>
                <meta name=\"AUTHOR\"      content=\"Brndon Tobin\"/>
                <meta name=\"keywords\"    content=\"HTML, Projects\"/>
                <meta name=\"description\" content=\"Due Process Form for $form->student_Name\"/>

                <!-- ALL CSS FILES -->
                <link rel=\"stylesheet\" href=\"../../../../Resources/css/stylesheet.css\" type=\"text/css\"/>

            </head>

            <body>";

                echo (getHeader());

                echo (getNavigation());

                echo (pageDataHeader("Due Progress Advisory Document for Ph.D. Degree"));

                echo "

                <!-- Due Progress Form -->
                <p><b>Date:</b><u> $form->date_completed</u></p>
                <p><b>Student Name:</b><u> $form->student_Name</u> <b>Student ID #</b> <u>$form->student_ID</u></p>
                <p><b>Degree:</b> <u>$form->degree</u> <b>Track:</b> <u>$form->track</u></p>
                <p><b>Semester Admitted:</b> <u>$form->semester_Admitted</u> <b># of semesters in the program</b> <u>$form->num_semesters</u></p>

                <form method='post'>
                ";

                //if ($form->advisor != '')
                //{
                    echo "<p><b>Advisor:</b> <u>$form->advisor</u></p>";
               // }
                /*else {
                    echo "
                    <label for=\"advisor\">Advisor:</label>
                    <select name=\"advisor\" id=\"advisor\">
                    ";

                    // Echo out the possible advisors
                    foreach ($form->advisor_array as $row) {
                        echo "<option value=\"$row\">$row</option>";
                    }

                    echo "
                    </select>
                    <br />
                    <br />";
                }*/

                //if (sizeof($form->committee) != 0)
                //{
                    echo "<p><b>Committee:</b></p>
                          <ul>";
                    // Echo out the committee members
                    foreach ($form->committee as $row)
                    {
                        echo "<li>$row</li>";
                    }
                    echo "</ul>";
                //}
                /*else {
                    echo "

                    <label for=\"committee\">Committee:</label>
                    <br />
                    <select name=\"committee1\" id=\"committee1\">";

                    // Echo out the possible committee members
                    foreach ($form->committee_array as $row) {
                        echo "<option value=\"$row\">$row</option>";
                    }

                    echo "
                    </select>

                    <br />

                    <select name=\"committee2\" id=\"committee2\">

                    ";

                    // Echo out the possible committee members
                    foreach ($form->committee_array as $row) {
                        echo "<option value=\"$row\">$row</option>";
                    }

                    echo "
                    </select>

                    <br />

                    <select name=\"committee3\" id=\"committee3\">

                    ";

                    // Echo out the possible committee members
                    foreach ($form->committee_array as $row) {
                        echo "<option value=\"$row\">$row</option>";
                    }

                    echo "
                    </select>

                    <br />

                    <select name=\"committee4\" id=\"committee4\">

                    ";

                    // Echo out the possible committee members
                    foreach ($form->committee_array as $row) {
                        echo "<option value=\"$row\">$row</option>";
                    }

                    echo "
                    </select>";
                }*/
                    echo "

                    <br />

                    <table class=\"roster\">
                        <tr>
                            <th>Activity</th>
                            <th>Number of Semesters</th>
                            <th>Completed Semester</th>
                        </tr>
                        <tr>
                            <td>Identify Advisor</td>
                            <td><input type=\"number\" name=\"activity1\" min=\"0\" max=\"20\" value=\"0\" /></td>
                            <td><input type=\"text\" name=\"semester_completed1\" placeholder=\"Semester Year\"</td>
                        </tr>
                        <tr>
                            <td>Program of study approved by advisor and initial committee</td>
                            <td><input type=\"number\" name=\"activity2\" min=\"0\" max=\"20\" value=\"0\" /></td>
                            <td><input type=\"text\" name=\"semester_completed2\" placeholder=\"Semester Year\"</td>
                        </tr>
                        <tr>
                            <td>Complete teaching mentorship</td>
                            <td><input type=\"number\" name=\"activity3\" min=\"0\" max=\"20\" value=\"0\" /></td>
                            <td><input type=\"text\" name=\"semester_completed3\" placeholder=\"Semester Year\"</td>
                        </tr>
                        <tr>
                            <td>Completed required courses</td>
                            <td><input type=\"number\" name=\"activity4\" min=\"0\" max=\"20\" value=\"0\" /></td>
                            <td><input type=\"text\" name=\"semester_completed4\" placeholder=\"Semester Year\"</td>
                        </tr>
                        <tr>
                            <td>Full committee formed</td>
                            <td><input type=\"number\" name=\"activity5\" min=\"0\" max=\"20\" value=\"0\" /></td>
                            <td><input type=\"text\" name=\"semester_completed5\" placeholder=\"Semester Year\"</td>
                        </tr>
                        <tr>
                            <td>Program of Study approved by committee</td>
                            <td><input type=\"number\" name=\"activity6\" min=\"0\" max=\"20\" value=\"0\" /></td>
                            <td><input type=\"text\" name=\"semester_completed6\" placeholder=\"Semester Year\"</td>
                        </tr>
                        <tr>
                            <td>Written qualifier</td>
                            <td><input type=\"number\" name=\"activity7\" min=\"0\" max=\"20\" value=\"0\" /></td>
                            <td><input type=\"text\" name=\"semester_completed7\" placeholder=\"Semester Year\"</td>
                        </tr>
                        <tr>
                            <td>Oral qualifier/Proposal</td>
                            <td><input type=\"number\" name=\"activity8\" min=\"0\" max=\"20\" value=\"0\" /></td>
                            <td><input type=\"text\" name=\"semester_completed8\" placeholder=\"Semester Year\"</td>
                        </tr>
                        <tr>
                            <td>Dissertation Defense</td>
                            <td><input type=\"number\" name=\"activity9\" min=\"0\" max=\"20\" value=\"0\" /></td>
                            <td><input type=\"text\" name=\"semester_completed9\" placeholder=\"Semester Year\"</td>
                        </tr>

                    </table>

                    <ol>
                        <li>Has the student met due progress requirements? <input type=\"radio\" name=\"requirements_met\" value=\"0\" checked>No <input type=\"radio\" name=\"requirements_met\" value=\"1\">Yes
                        <li>Describe the progress the student has made during the past year.</li>
                        <TEXTAREA NAME=\"comments\" COLS=40 ROWS=6></TEXTAREA>
                    </ol>

                    <!--<pre><u>      $form->student_Name               </u>Student Signature  <u>     $form->date_completed      </u> Date</pre>

                    <pre><u>      $form->advisor                    </u>Advisor Signature  <u>     $form->date_completed      </u> Date</pre>
                -->

                <input type=\"submit\" name=\"submit\" value=\"Submit\" />

                </form>
             </body>

    </html>

";

?>
