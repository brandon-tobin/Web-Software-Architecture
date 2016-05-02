<?php
/**
 * Created by PhpStorm.
 * User: Fumiko
 * Date: 5/1/2016
 * Time: 5:40 PM
 */

require('../../View/Partials/partial_view.php');

$name = $_SESSION['realname'];

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

            <body>
                <div class=\"container-fluid\">
                    <div class=\"row\">
                        <div class=\"col-sm-0 col-md-1 col-lg-2\"></div>
                        <div class=\"col-sm-12 col-md-10 col-lg-8\">";

    getNavBarWithoutRoles();

    echo "<h1 class='page-header'>Welcome {$name}</h1>";

                if($_SESSION['role'] == "admin")
                {
                        echo"<h2>Events I Created</h2>
                            <div class=\"table - responsive\">";
                                foreach ($events->events as $row)
                                {
                                    if ($row[0] == $name)
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
                                }
                                echo "</div>";
                    }

                        echo"<h2>Events I'm Attending</h2>
                            <div class=\"table - responsive\">";
                                foreach ($events->events as $row)
                                {
                                    if ($row[8] == 1) {
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
                                }
                                echo "
                            </div>
                        </div>

                        <h2>Events I Might Attend</h2>
                            <div class=\"table - responsive\">";
                                foreach ($events->events as $row)
                                {
                                    if ($row[8] == 2) {
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
                                }
                                echo "
                            </div>
                        </div>


                        <div class=\"col - sm - 0 col - md - 1 col - lg - 2\"></div>
                    </div>
                </div>

                <!-- jQuery -->
                <script src=\" ../../../Resources / Bootstrap / bootstrap - 3.3.6 - dist / js / jquery . js\"></script>

                <!-- Bootstrap Core JavaScript -->
                <script src=\" ../../../Resources / Bootstrap / bootstrap - 3.3.6 - dist / js / bootstrap . min . js\"></script>

            </body>
        </html>";