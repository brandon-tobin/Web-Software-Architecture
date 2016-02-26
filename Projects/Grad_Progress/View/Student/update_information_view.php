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

        <h1 class="form-header">User Information</h1>

        <form method="post" action="">
            <table>
                <tr>
                    <td><label for="name">Full Name:</label></td>
                    <td><input type="text" name="name" id="name" value=<?php echo $info->name?> /></td>
                </tr>
                <tr>
                    <td>uID Number:</td>
                    <td><?php echo $info->uid?></td>
                    <!--<td><label for="uid">uID Number:</label></td>
                    <td><input type="text" size="20" name="uid" id="uid" value=<?php echo $info->uid?> /></td>-->
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><?php echo $info->username?></td>
                    <!--<td><label for="username">Username:</label></td>
                    <td><input type="text" size="20" name="username" value=<?php echo $info->username?> /></td>-->
                </tr>
                <tr>
                    <td><label for="degree">Degree:</label></td>
                    <?php
                    if ($info->degree == 'Computing')
                    {
                        echo "<td><input type=\"radio\" name=\"degree\" id=\"degree\" value=\"Computer Science\" />Computer Science</td>
                              <td><input type=\"radio\" name=\"degree\" id=\"degree\" value=\"Computing\" checked/>Computing</td>";
                    }
                    else
                    {
                        echo "<td><input type=\"radio\" name=\"degree\" id=\"degree\" value=\"Computer Science\" checked/>Computer Science</td>
                              <td><input type=\"radio\" name=\"degree\" id=\"degree\" value=\"Computing\" />Computing</td>";
                    }
                    ?>
                </tr>
                <tr>
                    <td><label for="track">Track:</label></td>
                    <td>
                        <select name="track" id="track">
                            <?php
                            if ($info->track == 'Networking' || $info->track == '')
                            {
                                echo "
                                <option value=\"Networking\" selected>Networking</option>
                                <option value=\"Data\">Data</option>
                                <option value=\"Databases\">Databases</option>
                                <option value=\"Algorithms\">Algorithms</option>";
                            }
                            else if ($info->track == 'Data')
                            {
                                echo "
                                <option value=\"Networking\">Networking</option>
                                <option value=\"Data\" selected>Data</option>
                                <option value=\"Databases\">Databases</option>
                                <option value=\"Algorithms\">Algorithms</option>";
                            }
                            else if ($info->track == 'Databases')
                            {
                                echo "
                                <option value=\"Networking\">Networking</option>
                                <option value=\"Data\">Data</option>
                                <option value=\"Databases\" selected>Databases</option>
                                <option value=\"Algorithms\">Algorithms</option>";
                            }
                            else if ($info->track == 'Algorithms')
                            {
                                echo "
                                <option value=\"Networking\">Networking</option>
                                <option value=\"Data\">Data</option>
                                <option value=\"Databases\">Databases</option>
                                <option value=\"Algorithms\" selected>Algorithms</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Position:</td>
                    <td><?php echo $info->position?></td>
                    <!--<td><label for="position">Position:</label></td>
                    <td><input type="position" size="20" name="position" id="position" value=<?php echo $info->position?> /></td>-->
                </tr>
                <tr>
                    <td><label for="semester_admitted">Semester Admitted:</label></td>
                    <td><input type="text" size="20" name="semester_admitted" id="semester_admitted" value=<?php echo $info->semester_admitted?> /></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Submit" /></td>
                </tr>
            </table>
        </form>
    </body>
</html>
