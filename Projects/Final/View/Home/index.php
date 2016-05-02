<?php

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

                        <h1>Welcome!</h1>

                        <p>Please log in or create an account.</p>

                        <p class=\"text-danger\">{$message}</p>

                        <form method='post'>
                            <div class=\"form-group\">
                                <label for=\"username\">Username</label>
                                <input type=\"text\" class=\"form-control\" id=\"username\" name=\"username\" placeholder=\"Username\">
                            </div>
                            <div class=\"form-group\">
                                <label for=\"password\">Password</label>
                                <input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\" placeholder=\"Password\">
                            </div>
                            <input type='submit' class='btn btn-info' name='submit' value='Submit'>
                        </form>

                        <a class=\"btn btn-default\" href=\"new_user.php\" role=\"button\">Create Account</a>

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