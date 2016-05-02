<?php

require('../../View/Partials/partial_view.php');

echo "
    <!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\" \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">

    <html lang=\"en\">

        <head>
            <!-- Last Updated Spring 2016 -->
            <!-- Fumiko Anne Aoki -->
            <!-- University of Utah -->

            <!-- Bad Role Page  -->

            <title>Unauthorized Access</title>

            <!-- Meta Information about Page -->
            <meta charset=\"utf-8\"/>
            <meta name=\"AUTHOR\"      content=\"Fumiko Anne Aoki\"/>
            <meta name=\"keywords\"    content=\"HTML, Projects\"/>
            <meta name=\"description\" content=\"Bad Role Page\"/>

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

                        <h1 class='page-header'>Bad Role</h1>

                        <p>You are not authorized to view this page!</p>

                        <a class=\"btn btn-default\" href=\"../User/home.php\" role=\"button\">Go to Homepage</a>

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