<?php require('../../View/Partials/partial_view.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

    <html lang="en">

        <head>

            <!-- Last Updated Spring 2016 -->
            <!-- Brandon Tobin -->
            <!-- University of Utah -->

            <!-- Failed Account Creation -->

            <title>Account Creation Failed</title>

            <!-- Meta Information about Page -->
            <meta charset="utf-8"/>
            <meta name="AUTHOR"      content="Brndon Tobin"/>
            <meta name="keywords"    content="HTML, Projects"/>
            <meta name="description" content="Landing page for failed account creation"/>

            <!-- ALL CSS FILES -->
            <!--<link rel="stylesheet" href="../../../../Resources/css/stylesheet.css" type="text/css"/>-->
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

        echo (getNavBar($_SESSION['roles']));

        echo (pageDataHeader("New User Creation Failed"));

        ?>

            <p>Account Creation Failed. Please check to make sure you do not currently have an account.</p>

        </div>
        <div class="col-sm-0 col-md-1 col-lg-2"></div>
        </div>
        </div>


        <!-- jQuery -->
        <script src="../../../Resources/Bootstrap/bootstrap-3.3.6-dist/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../../../Resources/Bootstrap/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
        </body>
    </html>
