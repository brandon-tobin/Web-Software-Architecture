<?php require('../../View/Partials/partial_view.php'); ?>
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
        <!-- Bootstrap Core CSS -->
        <link href="../../../../Resources/Bootstrap/bootstrap-3.3.6-dist/css/bootstrap.css" rel="stylesheet">

    </head>

    <body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-0 col-md-1 col-lg-2"></div>
            <div class="col-sm-12 col-md-10 col-lg-8">

        <?php

        echo (getHeader());

        echo (getNavigation());

        echo (getNavBar($_SESSION['roles'])); ?>

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li><a href="../Account/account_home.php">Account Home</a></li>
            <li class="active">Change User Role</li>
        </ol>

        <?php echo (pageDataHeader("Change User Roles")); ?>

        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed">
                <tr>
                    <th>Username</th>
                    <th>Role</th>
                </tr>

                <?php

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
        </div>

        <p>Please select the username and roll you wish to change the user to.</p>

        <form method="post">
            <label for="user">Username:</label>
            <select name="user" id="user">
                <?php
                // Echo out the Usernames
                foreach ($dgs->username as $row) {
                echo "<option value=\"$row[0]\">$row[0]</option>";
                }
                ?>
            </select>
            <label for="role">Role:</label>
            <select name="role" id="role">
                <option value="student">student</option>
                <option value="faculty">faculty</option>
                <option value="staff">staff</option>
                <option value="dgs">dgs</option>
            </select>

            <br /><br />

            <button class="btn btn-primary" type="submit" name="submit" value="Submit">
                Submit
                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
            </button>
        </form>
        </div> <!-- Ending Column -->
        </div class="col-sm-0 col-md-1 col-lg-2"></div>
    </div> <!-- Ending Row -->
    </body>
</html>
