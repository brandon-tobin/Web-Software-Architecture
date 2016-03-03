<?php require('../../View/Partials/partial_view.php'); ?>
<!--/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * User Creation Form View -- View for displaying the the user creation form
 *
 */-->

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

        <html lang="en">

            <head>

                <!-- Last Updated Spring 2016 -->
                <!-- Brandon Tobin -->
                <!-- University of Utah -->

                <!-- Account Creation -->

                <title>Account Creation</title>

                <!-- Meta Information about Page -->
                <meta charset="utf-8"/>
                <meta name="AUTHOR"      content="Brndon Tobin"/>
                <meta name="keywords"    content="HTML, Projects"/>
                <meta name="description" content="Landing page for account creation"/>

                <!-- ALL CSS FILES -->
                <link rel="stylesheet" href="../../../../Resources/css/stylesheet.css" type="text/css"/>
                <!-- Bootstrap Core CSS -->
                <link href="../../../../Resources/Bootstrap/bootstrap-3.3.6-dist/css/bootstrap.css" rel="stylesheet">

            </head>

            <body>

                <?php

                echo (getHeader());

                echo (getNavigation());

                $roles = array();
                array_push($roles, 'register');
                echo (getNavBar($roles));

                echo (pageDataHeader("New User Creation Form"));

                ?>

                <p>Please fill in the information below to register for a new user account.</p>

                <!-- Creation form for new user -->
                <form method="post" action="">
                    <table>
                        <tr>
                            <td><label for="name">Full Name:</label></td>
                            <td><input type="text" name="name" id="name" required/></td>
                            <td><span style="color:red"><?php echo $nameError ?></span></td>
                        </tr>
                        <tr>
                            <td><label for="uid">uID Number</label></td>
                            <td><input type="text" size="20" name="uid" id="uid" placeholder="0123456" /></td>
                            <td><span style="color:red"><?php echo $uidError ?></span></td>

                        </tr>
                        <tr>
                            <td><label for="username">Username:</label></td>
                            <td><input type="text" size="20" name="username" id="username" required/></td>
                            <td><span style="color:red"><?php echo $loginError ?></span></td>
                        </tr>
                        <tr>
                            <td><label for="password">Password</label></td>
                            <td><input type="password" size="20" name="password" id="password" /></td>
                            <td><span style="color:red"><?php echo $passwordError ?></span></td>
                        </tr>
                        <tr>
                            <td><label for="password">Confirm Password</label></td>
                            <td><input type="password" size="20" name="confirmedPassword" id="confirmedPassword" /></td>
                            <td><span style="color:red"><?php echo $confirmedPasswordError ?></span></td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="submit" value="Register" /></td>
                            <td><input type="submit" name="submit" value="Cancel"</td>
                        </tr>
                    </table>
                </form>
            </body>
        </html>
