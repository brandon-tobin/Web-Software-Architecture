<?php
/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * Overview View
 *
 */

echo "

<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\" \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">

    <html lang=\"en\">
        <head>

        <!-- Last Updated Spring 2016 -->
        <!-- Brandon Tobin -->
        <!-- University of Utah -->

        <!-- This page contains a list of all advisors  -->


        <title>Advisors</title>

        <!-- Meta Information about Page -->
        <meta charset=\"utf-8\"/>
        <meta name=\"AUTHOR\"      content=\"Brndon Tobin\"/>
        <meta name=\"keywords\"    content=\"HTML, Projects\"/>
        <meta name=\"description\" content=\"List of advisors\"/>

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
                <li><a href=\"../../../index.html\">Home</a></li>
                <li><a href=\"../../../Projects/\">Projects</a></li>
                <li><a href=\"../../../Class_Examples/\">Examples</a></li>
            </ul>

            <h1>Graduate Advisors</h1>

            <!-- Table containing advisors -->
            <table class=\"roster\">
                <tr>
                    <th>Name:</th>
                    <th>Profile:</th>
                </tr>
                <tr>";

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

            <h1>Graduate Students</h1>

            <!-- Table containing advisors -->
            <table class=\"roster\">
                <tr>
                    <th>Name:</th>
                    <th>Profile:</th>
                </tr>
                <tr>";

                // Echo out all Students
                foreach ($dgs->students as $row)
                {
                    echo "<tr>";
                    foreach ($row as $value)
                    {
                        echo "<td>$value</td>";
                    }
                    echo "</tr>";
                }

                echo "

        </body>

    </html>

";