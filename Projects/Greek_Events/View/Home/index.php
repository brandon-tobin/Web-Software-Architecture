<?php
/**
 * Created by PhpStorm.
 * User: Fumiko
 * Date: 4/14/2016
 * Time: 10:43 PM
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

            <h1>Welcome!</h1>

            <p>Please log in or create an account.</p>

            <form method='post'>
              <div class=\"form-group\">
                <label for=\"username\">Username</label>
                <input type=\"text\" class=\"form-control\" id=\"username\" placeholder=\"Username\">
              </div>
              <div class=\"form-group\">
                <label for=\"password\">Password</label>
                <input type=\"password\" class=\"form-control\" id=\"password\" placeholder=\"Password\">
              </div>
              <button type=\"submit\" class=\"btn btn-default\" id=\"login\">Submit</button>
            </form>

            <a class=\"btn btn-default\" href=\"new_user.php\" role=\"button\">Create Account</a>

            <!-- jQuery -->
    <script src=\"../../../Resources/Bootstrap/bootstrap-3.3.6-dist/js/jquery.js\"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src=\"../../../Resources/Bootstrap/bootstrap-3.3.6-dist/js/bootstrap.min.js\"></script>


            </body>
            </html>";