<?php require('../View/Partials/partial_view.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

    <html lang="en">
        <head>

            <!-- Last Updated Spring 2016 -->
            <!-- Brandon Tobin -->
            <!-- University of Utah -->

            <!-- This is a landing page for Grad Progress  -->


            <title>Grad Progress</title>

            <!-- Meta Information about Page -->
            <meta charset="utf-8"/>
            <meta name="AUTHOR"      content="Brndon Tobin"/>
            <meta name="keywords"    content="HTML, Projects"/>
            <meta name="description" content="Landing page for Grad Progress"/>

            <!-- ALL CSS FILES -->
            <link rel="stylesheet" href="../../../Resources/css/stylesheet.css" type="text/css"/>

        </head>

        <body>

        <?php

        echo (getHeader());

        echo (getNavigation());

        echo (getNavBar(''));

        if (isset($_SESSION['userid']))
        {
            header ("Location: ../View/Account/account_home.php");
            //require ('../View/Account/account_home.php');
        }

        echo (pageDataHeader("Welcome to the Graduate Student System!"));

        ?>

        </body>

    </html>
