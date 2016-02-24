<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html lang="en">

    <head>

        <!-- Last Updated Spring 2016 -->
        <!-- Brandon Tobin -->
        <!-- University of Utah -->

        <!-- View for updating user roles  -->

        <title>User Roles</title>

        <!-- Meta Information about Page -->
        <meta charset="utf-8"/>
        <meta name="AUTHOR"      content="Brndon Tobin"/>
        <meta name="keywords"    content="HTML, Projects"/>
        <meta name="description" content="Landing page for updating user roles"/>

        <!-- ALL CSS FILES -->
        <link rel="stylesheet" href="../../../../Resources/css/stylesheet.css" type="text/css"/>

    </head>

    <body>

        <!-- Header -->
        <div id="header">
            <img src="/Resources/Images/uofufootball.jpg" alt="Rice Eccles Stadium" />
            <h1>University of Utah - CS 4540</h1>
            <h2>Web Software Architecture - Spring 2016</h2>
            <h2>Brandon Tobin</h2>
            <h2>Grad Progress - Assignment 5</h2>
        </div>

        <!-- Navigation Bar -->
        <ul id="navigation">
            <li><a href="../../../../index.html">Home</a></li>
            <li><a href="../../../">Projects</a></li>
            <li><a href="../../../../Class_Examples">Examples</a></li>
            <li><a href="../DGS/overview.php">DGS Overview</a></li>
        </ul>

        <h1 class="form-header">User Roles</h1>

        <table class="roster">
            <tr>
                <th>Username</th>
                <th>Role</th>
            </tr>

            <?php

            error_reporting(E_ALL);
            ini_set("display_errors", 1);

            if (is_array($dgs->username))
            {
                echo "Is array";
            }
            else
            {
                echo "Is not an array";
                echo $dgs->username;
            }


            foreach ($dgs->username as $row)
            {
                echo "<tr>";
                foreach ($row as $value) {
                    echo "<td>$value</td>";
                }
                echo "</tr>";
            }
            ?>

        </table>
    </body>
</html>