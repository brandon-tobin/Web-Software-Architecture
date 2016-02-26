<?php require('../../View/Partials/partial_view.php'); ?>
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

        echo (pageDataHeader("Please Log In"));

        ?>

        <p id="error"><?php echo $message ?></p>

        <form method="post">

            <table>
                <tr>
                    <td><label for="username">Username</label></td>
                    <td><input type="text" size="20" name="username" id="username" /></td>
                </tr>
                <tr>
                    <td><label for="password">Password</label></td>
                    <td><input type="password" size="20" name="password" id="password" /></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Submit" /></td>
                </tr>
            </table>

        </form>

    </body>
</html>
