<?php
/**
* Author: Brandon Tobin
* Date: Spring 2016
*
* Progress Form View -- View for displaying the student's form
*
*/

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

            <body>

                <!-- Header -->
                <div id=\"header\">
                    <img src=\"/Resources/Images/uofufootball.jpg\" alt=\"Rice Eccles Stadium\" />
                    <h1>University of Utah - CS 4540</h1>
                    <h2>Web Software Architecture - Spring 2016</h2>
                    <h2>Brandon Tobin</h2>
                    <h2>Grad Progress - Assignment 3</h2>
                </div>

                <!-- Navigation Bar -->
                <ul id=\"navigation\">
                    <li><a href=\"../../../../index.html\">Home</a></li>
                    <li><a href=\"../../../../Projects/\">Projects</a></li>
                    <li><a href=\"../../../../Class_Examples/\">Examples</a></li>
                </ul>

                <h1 class=\"form-header\">Due Progress Advisory Document for Ph.D. Degree</h1>

                <!-- Due Progress Form -->
                <p><b>Date:</b><u> $form->date_completed</u></p>
                <p><b>Student Name:</b><u> $form->student_Name</u> <b>Student ID #</b> <u>$form->student_ID</u></p>
                <p><b>Degree:</b> <u>$form->degree</u> <b>Track:</b> <u>$form->track</u></p>
                <p><b>Semester Admitted:</b> <u>$form->semester_Admitted</u> <b># of semesters in the program</b> <u>$form->num_semesters</u></p>

                <form method='post'>
                    <label for=\"advisor\">Advisor:</label>
                    <select name=\"advisor\" id=\"advisor\">

                    ";

                    // Echo out the possible advisors
                    foreach ($form->advisor_array as $row)
                    {
                        echo "<option value=\"$row\">$row</option>";
                    }

                    echo "
                    </select>

                    <br />
                    <br />

                    <label for=\"committee\">Committee:</label>
                    <br />
                    <select name=\"committee1\" id=\"committee1\">

                    ";

                    // Echo out the possible committee members
                    foreach ($form->committee_array as $row)
                    {
                        echo "<option value=\"$row\">$row</option>";
                    }

                    echo "
                    </select>

                    <br />

                    <select name=\"committee2\" id=\"committee2\">

                    ";

                    // Echo out the possible committee members
                    foreach ($form->committee_array as $row)
                    {
                        echo "<option value=\"$row\">$row</option>";
                    }

                    echo "
                    </select>

                    <br />

                    <select name=\"committee3\" id=\"committee3\">

                    ";

                    // Echo out the possible committee members
                    foreach ($form->committee_array as $row)
                    {
                        echo "<option value=\"$row\">$row</option>";
                    }

                    echo "
                    </select>

                    <br />

                    <select name=\"committee4\" id=\"committee4\">

                    ";

                    // Echo out the possible committee members
                    foreach ($form->committee_array as $row)
                    {
                        echo "<option value=\"$row\">$row</option>";
                    }

                    echo "
                    </select>

                    <br />

                    <table class=\"roster\">
                        <tr>
                            <th>Activity</th>
                            <th>Number of Semesters</th>
                            <th>Good / Acceptable</th>
                            <th>Completed Semester</th>
                        </tr>
                        <tr>
                            <td>Identify Advisor</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
















                    </table>

                    <ol>
                        <li>Has the student met due progress requirements? $form->question1</li>
                        <li>Describe the progress the student has made during the past year.</li>
                    </ol>

                    <p>$form->question2</p>

                    <pre><u>      $form->student_Name               </u>Student Signature  <u>     $form->date_completed      </u> Date</pre>

                    <pre><u>      $form->advisor                    </u>Advisor Signature  <u>     $form->date_completed      </u> Date</pre>
                </form>
             </body>

    </html>

";

?>
