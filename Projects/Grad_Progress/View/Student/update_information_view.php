<?php require('../../View/Partials/partial_view.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html lang="en">

    <head>

        <!-- Last Updated Spring 2016 -->
        <!-- Brandon Tobin -->
        <!-- University of Utah -->

        <!-- View for updating user information  -->

        <title>User Roles</title>

        <!-- Meta Information about Page -->
        <meta charset="utf-8"/>
        <meta name="AUTHOR"      content="Brndon Tobin"/>
        <meta name="keywords"    content="HTML, Projects"/>
        <meta name="description" content="Landing page for updating user information"/>

        <!-- ALL CSS FILES -->
        <link rel="stylesheet" href="../../../../Resources/css/stylesheet.css" type="text/css"/>
        <!-- Bootstrap Core CSS -->
        <link href="../../../../Resources/Bootstrap/bootstrap-3.3.6-dist/css/bootstrap.css" rel="stylesheet">

    </head>

    <body>

        <?php

        echo (getHeader());

        echo (getNavigation());

        echo (getNavBar($_SESSION['roles'])); ?>

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li><a href="../Account/account_home.php">Account Home</a></li>
            <li class="active">Edit My Information</li>
        </ol>

        <?php echo (pageDataHeader("User Information")); ?>

        <form method="post" action="">
            <div class="table-responsive">
                <table class="table table-hover">
                    <tr>
                        <td>Full Name:</td>
                        <td><?php echo $info->name?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>uID Number:</td>
                        <td><?php echo $info->uid?></td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>Username:</td>
                        <td><?php echo $info->username?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><label for="degree">Degree:</label></td>
                        <?php
                        if ($info->degree == 'Computing')
                        {
                            echo "<td><input type=\"radio\" name=\"degree\" id=\"degree\" value=\"Computer Science\" />Computer Science<pre>   </pre>
                                  <input type=\"radio\" name=\"degree\" id=\"degree\" value=\"Computing\" checked/>Computing</td>";
                        }
                        else
                        {
                            echo "<td><input type=\"radio\" name=\"degree\" id=\"degree\" value=\"Computer Science\" checked/>Computer Science <br />
                                  <input type=\"radio\" name=\"degree\" id=\"degree\" value=\"Computing\" />Computing</td>";
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
                    </tr>
                    <tr>
                        <td><label for="semester_admitted">Semester Admitted:</label></td>
                        <td><input type="text" size="20" name="semester_admitted" id="semester_admitted" value=<?php echo $info->semester_admitted?> /></td>
                    </tr>
                    <tr>
                        <td>Advisor: </td>
                        <td><?php echo $info->advisor?></td>
                    </tr>
                    <tr>
                        <td><label for="advisor">Select New Advisor</label></td>
                        <td>
                            <select name="advisor" id="advisor">
                                <?php
                                // Echo out the possible advisors
                                foreach ($info->all_advisors as $row) {
                                echo "<option value=\"$row\">$row</option>";
                                }?>
                            </select>
                        </td>
                        <td><label for="new_advisor_checked">Check if you want to update advisor.</label></td>
                        <td><input type="checkbox" name="new_advisor_checked" id="new_advisor_checked"</td>
                    </tr>
                    <tr>
                        <td>Current Committee:</td>
                        <td>
                            <ul>
                                <?php
                                if (sizeof($info->committee) != 0)
                                foreach ($info->committee as $row)
                                {
                                    echo "<li>$row</li>";
                                }
                                ?>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="committee">Select New Committee Members</label></td>
                        <td>
                            <select name="committee1" id="committee1">
                                <?php
                                // Echo out the possible committee members
                                foreach ($info->all_committee as $row) {
                                echo "<option value=\"$row\">$row</option>";
                                }?>
                            </select>
                            <br />
                            <select name="committee2" id="committee2">
                                <?php
                                // Echo out the possible committee members
                                foreach ($info->all_committee as $row) {
                                echo "<option value=\"$row\">$row</option>";
                                }?>
                            </select>
                            <br />
                            <select name="committee3" id="committee3">
                                <?php
                                // Echo out the possible committee members
                                foreach ($info->all_committee as $row) {
                                echo "<option value=\"$row\">$row</option>";
                                }?>
                            </select>
                            <br />
                            <select name="committee4" id="committee4">
                                <?php
                                // Echo out the possible committee members
                                foreach ($info->all_committee as $row) {
                                echo "<option value=\"$row\">$row</option>";
                                }?>
                            </select>
                        </td>
                        <td><label for="new_committee_checked">Check if you want to update committee.</label></td>
                        <td><input type="checkbox" name="new_committee_checked" id="new_committee_checked"</td>
                    </tr>
                    <tr>
                        <?php
                        if ($info->first_submission == true)
                        {
                            echo "
                            <td colspan=\"2\">
                                <button class=\"btn btn-primary\" type=\"submit\" name=\"submit\" value=\"Submit\">
                                    Submit
                                    <span class=\"glyphicon glyphicon-ok\" aria-hidden=\"true\"></span>
                                </button>
                            </td>";
                        }
                            //echo "<td colspan=\"2\"><input type=\"submit\" name=\"submit\" value=\"Submit\" /></td>";
                        else
                        {
                            echo "
                            <td colspan=\"2\">
                                <button class=\"btn btn-primary\" type=\"submit\" name=\"Submit\" value=\"Submit\">
                                    Submit
                                    <span class=\"glyphicon glyphicon-ok\" aria-hidden=\"true\"></span>
                                </button>
                            </td>";
                        }

                            //echo "<td colspan=\"2\"><input type=\"submit\" name=\"Submit\" value=\"Submit\" /></td>"
                        ?>
                    </tr>
                </table>
            </div>
        </form>
    </body>
</html>
