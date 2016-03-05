<?php require('../../View/Partials/partial_view.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html lang="en">

    <head>

        <!-- Last Updated Spring 2016 -->
        <!-- Brandon Tobin -->
        <!-- University of Utah -->

        <!-- Update student status  -->

        <title>Login</title>

        <!-- Meta Information about Page -->
        <meta charset="utf-8"/>
        <meta name="AUTHOR"      content="Brndon Tobin"/>
        <meta name="keywords"    content="HTML, Projects"/>
        <meta name="description" content="Landing page for updating a student status"/>

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
            <li class="active">Update My Status</li>
        </ol>

        <?php echo (pageDataHeader("Student Status")); ?>

        ?>

        <p>Your status is currently: <?php echo $status->student_status?></p>

        <p>Please select the correct entry for how you would like to update your status. Please keep in mind that this operation will invalidate your most recent approval.</p>

        <form method="post">
            <label for="update">Please update my status to:</label>
            <input type="radio" name="update" value="0">Does not meet requirements
            <input type="radio" name="update" value="1">Does meet requirements

            <br />
            <br />
            <input type="submit" name="submit" value="Submit" />
        </form>
    </body>
</html>
