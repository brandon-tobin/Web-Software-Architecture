<?php
/**
 * Created by PhpStorm.
 * User: brand
 * Date: 4/14/2016
 * Time: 9:28 PM
 */

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

                <div class=\"container - fluid\">
                    <div class=\"row\">
                        <div class=\"col-sm-0 col-md-1 col-lg-2\"></div>
                        <div class=\"col-sm-12 col-md-10 col-lg-8\">

                            <h1>View All Events</h1>

                            <div class=\"table - responsive\">
                                <table class=\"table table - striped table - bordered table - condensed\">
                                    <tr>
                                        <th>Creator:</th>
                                        <th>Creator Username:</th>
                                        <th>Organization:</th>
                                        <th>Event Name:</th>
                                        <th>Event Date:</th>
                                        <th>Event Description:</th>
                                        <th>Event Location</th>
                                    </tr>";
                                    // Echo out all entries in student array
                                    foreach ($events->events as $row)
                                    {
                                        echo "<tr>";
                                        foreach ($row as $value)
                                        {
                                            echo "<td>$value</td>";
                                        }
                                        echo "</tr>";
                                    }


                                    // Echo out all entries in student array
                                    foreach ($events->events as $row)
                                    {
                                        echo "<div class='panel panel-success'>";
                                        echo "<div class='panel-heading'>$row[3]</div>";
                                        echo "<div class='panel-body'>$row[4]</div>";
                                        echo "<div class='panel-body'>$row[6]</div>";
                                        echo "<div class='panel-body'>$row[5]</div>";
                                        echo "<div class='panel-body'>$row[0]</div>";
                                        echo "<div class='panel-body'>$row[2]</div>";
                                        echo "</div>";
                                    }

                                    echo "
                                </table>
                            </div>
                        </div>
                        <div class=\"col-sm-0 col-md-1 col-lg-2\"></div>
                    </div>
                </div>

            </body>
        </html>";