<?php require('../../View/Partials/partial_view.php');


require ('../Model/Functions/db.php');
require ('../Model/Functions/authentication.php');

if (isset($_REQUEST['submit']) && isset($_REQUEST['username']) && isset($_REQUEST['password']))
{
    verify_Login('');

    header("Location: Account/account_home.php");
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

    <html lang="en">

        <head>

            <!-- Last Updated Spring 2016 -->
            <!-- Brandon Tobin -->
            <!-- University of Utah -->

            <!-- Account Creation Success  -->

            <title>Account Creation Successful</title>

            <!-- Meta Information about Page -->
            <meta charset="utf-8"/>
            <meta name="AUTHOR"      content="Brndon Tobin"/>
            <meta name="keywords"    content="HTML, Projects"/>
            <meta name="description" content="Landing page for successful account creation"/>

            <!-- ALL CSS FILES -->
            <link rel="stylesheet" href="../../../../Resources/css/stylesheet.css" type="text/css"/>
            <!-- Bootstrap Core CSS -->
            <link href="../../../../Resources/Bootstrap/bootstrap-3.3.6-dist/css/bootstrap.css" rel="stylesheet">

        </head>

        <body>

            <?php

            echo (getHeader());

            echo (getNavigation());?>

            <!-- Navigation -->
            <nav class="navbar navbar-custom " role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Welcome Please Login To Continue</a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <form method="post" class="navbar-form navbar-right">
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <button type="submit" name="submit" class="btn btn-default">Sign In</button>
                        </form>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container -->
            </nav>

            <?php echo (pageDataHeader("New User Creation Form"));?>

            <p>Account created successful.</p>

            <a href="account_home.php">Click Here to Login</a>

        </body>
    </html>
