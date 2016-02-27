<?php

require ('../../Model/Functions/db.php');
require ('../../Model/Functions/authentication.php');
require ('../../View/Partials/partial_view.php');

session_start();

unset($_SESSION['userid']);
unset($_SESSION['realname']);
unset($_SESSION['login']);
unset($_SESSION['roles']);

header("Location: ../home.php");

//require ('../../Controller/home.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html lang="en">

    <head>

        <!-- Last Updated Spring 2016 -->
        <!-- Brandon Tobin -->
        <!-- University of Utah -->

        <!-- Due Process Form for $form->student_Name  -->

        <title>Login</title>

        <!-- Meta Information about Page -->
        <meta charset="utf-8"/>
        <meta name="AUTHOR"      content="Brndon Tobin"/>
        <meta name="keywords"    content="HTML, Projects"/>
        <meta name="description" content="Landing page for successful account creation"/>

        <!-- ALL CSS FILES -->
        <link rel="stylesheet" href="../../../../Resources/css/stylesheet.css" type="text/css"/>

    </head>

    <body>

        <?php

        echo (getHeader());

        echo (getNavigation());

        echo (pageDataHeader("You have logged out."));

        ?>

        <p><a href="account_home.php">Login</a></p>

        <p><a href="../../Controller/home.php">Main Home Page</a></p>

    </body>
</html>
