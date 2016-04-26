<?php
/**
 * Created by PhpStorm.
 * User: brand
 * Date: 4/14/2016
 * Time: 9:28 PM
 */

require('../../View/Partials/partial_view.php');

echo "
        <!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\" \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">

        <html lang=\"en\">

            <head>

                <!-- Last Updated Spring 2016 -->
                <!-- Brandon Tobin -->
                <!-- University of Utah -->

                <!-- View All Events -->

                <title>View All Events</title>

                <!-- Meta Information about Page -->
                <meta charset=\"utf-8\"/>
                <meta name=\"AUTHOR\"      content=\"Brndon Tobin\"/>
                <meta name=\"keywords\"    content=\"HTML, Projects\"/>
                <meta name=\"description\" content=\"View All Events\"/>

                <!-- ALL CSS FILES -->
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

                            <h1 class='page-header'>View All Events</h1>

                            <div class=\"table - responsive\">";
                                foreach ($events->events as $row)
                                {
                                    echo "<div class='panel panel-success'>";
                                    echo "<div class='panel-heading'><a href='$row[7]'>$row[3]</a></div>";
                                    echo "<div class='panel-body'>
                                            <b>Event Date:</b> $row[4] <br />
                                            <b>Event Location:</b> $row[6] <br />
                                            <b>Event Description:</b> $row[5] <br /><br />
                                            <b>Creator:</b> $row[0] <br />
                                            <b>Creator's Organization:</b> $row[2] <br />
                                         </div>
                                     </div>";
                                }
                                echo "
                            </div>
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