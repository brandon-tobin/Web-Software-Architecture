<?php
/**
* Author: Brandon Tobin
* Date: Spring 2016
*
* Student List View -- View for showing which students belong to which advisor
*
*/

echo "

    <!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\" \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">

        <html lang=\"en\">

            <head>

                <!-- Last Updated Spring 2016 -->
                <!-- Brandon Tobin -->
                <!-- University of Utah -->

                <!-- This page contains a list of all graduate students for $advisor->advisor_First_Name -->


                <title>$advisor->advisor_First_Name's Student Roster</title>

                <!-- Meta Information about Page -->
                <meta charset=\"utf-8\"/>
                <meta name=\"AUTHOR\"      content=\"Brndon Tobin\"/>
                <meta name=\"keywords\"    content=\"HTML, Projects\"/>
                <meta name=\"description\" content=\"List of graduate students for $advisor->advisor_First_Name\"/>

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
                    <h2>Grad Progress - Assignment 2</h2>
                </div>

                <!-- Navigation Bar -->
                <ul id=\"navigation\">
                    <li><a href=\"../../../../index.html\">Home</a></li>
                    <li><a href=\"../../../../Projects/\">Projects</a></li>
                    <li><a href=\"../../../../Class_Examples/\">Examples</a></li>
                </ul>

                <h1>Graduate Students</h1>

                <!-- Table containing students -->
                <table class=\"roster\">
                    <tr>
                        <th>Name:</th>
                        <th>Compliance:</th>
                        <th>Current Form Date:</th>
                        <th>Current Form:</th>
                        <th>Advisor Signature:</th>
                        <th>Profile</th>
                    </tr>";

                    // Echo out all entries in student array
                    foreach ($advisor->student_Array as $row)
                    {
                        echo "<tr>";
                        foreach ($row as $value)
                        {
                            echo "<td>$value</td>";
                        }
                        echo "</tr>";
                    }



                  /*  for ($i = 0; $i < $advisor->student_Count; $i++)
                    {
                    echo "
                    <tr>
                        <td>{$advisor->student_Array[0 + $i*6]}</td>
                        <td>{$advisor->student_Array[1 + $i*6]}</td>
                        <td>{$advisor->student_Array[2 + $i*6]}</td>
                        <td>{$advisor->student_Array[3 + $i*6]}</td>
                        <td>{$advisor->student_Array[4 + $i*6]}</td>
                        <td><a href=\"{$advisor->student_Array[5 + $i*6]}\">View</a></td>
                    </tr>";
                    }*/



                    echo "

                </table>

            </body>

        </html>
";