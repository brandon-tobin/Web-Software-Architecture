<?php
/**
 * Created by PhpStorm.
 * User: Fumiko
 * Date: 5/1/2016
 * Time: 12:12 PM
 */

require('../../View/Partials/partial_view.php');
require_once ('../../Model/Functions/authentication.php');

getUserInfo();

unset($_SESSION['login']);
unset($_SESSION['realname']);
unset($_SESSION['role']);

session_unset();
changeSessionID();

error_log("ANNE: session login {$_SESSION['login']}");
error_log("ANNE: session name {$_SESSION['realname']}");
error_log("ANNE: session role {$_SESSION['role']}");

require('../../View/Partials/partial_view.php');

echo "
        <!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\" \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">

        <html lang=\"en\">

            <head>

                <!-- Last Updated Spring 2016 -->
                <!-- Brandon Tobin -->
                <!-- University of Utah -->

                <!-- Create New Event  -->

                <title>Create New Event</title>

                <!-- Meta Information about Page -->
                <meta charset=\"utf-8\"/>
                <meta name=\"AUTHOR\"      content=\"Brndon Tobin\"/>
                <meta name=\"keywords\"    content=\"HTML, Projects\"/>
                <meta name=\"description\" content=\"Create New Event \"/>

                <!-- Bootstrap Core CSS -->
                <link href=\"../../../../Resources/Bootstrap/bootstrap-3.3.6-dist/css/bootstrap.css\" rel=\"stylesheet\">

            </head>

            <body>

                <div class=\"container-fluid\">
                    <div class=\"row\">
                        <div class=\"col-sm-0 col-md-1 col-lg-2\"></div>
                        <div class=\"col-sm-12 col-md-10 col-lg-8\">";

echo getNavBarWithoutRoles();

echo "

                            <h1 class='page-header'>Logout Successful</h1>

                            <a class=\"btn btn-default\" href=\"../Home/index.php\" role=\"button\">Go to Main Page</a>

                        </div>
                        <div class=\"col-sm-0 col-md-1 col-lg-2\"></div>
                    </div>
                </div>

                <!-- jQuery -->
                <script src=\"../../../Resources/Bootstrap/bootstrap-3.3.6-dist/js/jquery.js\"></script>

                <!-- Bootstrap Core JavaScript -->
                <script src=\"../../../Resources/Bootstrap/bootstrap-3.3.6-dist/js/bootstrap.min.js\"></script>

            </body>
        </html>";
