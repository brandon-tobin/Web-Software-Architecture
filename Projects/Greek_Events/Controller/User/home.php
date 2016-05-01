<?php
/**
 * Created by PhpStorm.
 * User: Fumiko
 * Date: 5/1/2016
 * Time: 3:23 AM
 */

require('../../View/Partials/partial_view.php');

echo "
        <!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\" \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">

        <html lang=\"en\">

            <head>

                <!-- Last Updated Spring 2016 -->
                <!-- Fumiko Anne Aoki -->
                <!-- University of Utah -->

                <!-- Greek Event Homepage  -->

                <title>Greek Event Homepage</title>

                <!-- Meta Information about Page -->
                <meta charset=\"utf-8\"/>
                <meta name=\"AUTHOR\"      content=\"Fumiko Aoki\"/>
                <meta name=\"keywords\"    content=\"HTML, Projects\"/>
                <meta name=\"description\" content=\"Greek Event Homepage\"/>

                <!-- ALL CSS FILES -->
                <!--<link rel=\"stylesheet\" href=\"../../../../Resources/css/stylesheet.css\" type=\"text/css\"/> -->
                <!-- Bootstrap Core CSS -->
                <link href=\"../../../../Resources/Bootstrap/bootstrap-3.3.6-dist/css/bootstrap.css\" rel=\"stylesheet\">

            </head>

            <body>";

echo getNavBarWithoutRoles();

echo "

            <h1>Homepage</h1>


            <a class=\"btn btn-default\" href=\"home.php\" role=\"button\">Go to Homepage</a>

            <!-- jQuery -->
    <script src=\"../../../Resources/Bootstrap/bootstrap-3.3.6-dist/js/jquery.js\"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src=\"../../../Resources/Bootstrap/bootstrap-3.3.6-dist/js/bootstrap.min.js\"></script>


            </body>
            </html>";