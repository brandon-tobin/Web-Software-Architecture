<?php require('../../View/Partials/partial_view.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html lang="en">

    <head>

        <!-- Last Updated Spring 2016 -->
        <!-- Brandon Tobin -->
        <!-- University of Utah -->

        <!-- Student Status View  -->

        <title>Login</title>

        <!-- Meta Information about Page -->
        <meta charset="utf-8"/>
        <meta name="AUTHOR"      content="Brndon Tobin"/>
        <meta name="keywords"    content="HTML, Projects"/>
        <meta name="description" content="Landing page for viewing student status"/>

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
            <li class="active">View My Status</li>
        </ol>

        <?php echo (pageDataHeader("Student Status")); ?>

        <p>Your status is currently: <?php echo $status->student_status?></p>
        <p><?php echo $status->advisor_approval ?></p>

        <?php echo (getFooter()); ?>

        </div> <!-- Ending column -->
        <div class="col-sm-0 col-md-1 col-lg-2"></div>
    </div> <!-- Ending Row -->

    </body>
</html>
