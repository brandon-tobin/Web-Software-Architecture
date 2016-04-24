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

                <!-- View Event -->

                <title>Event View</title>

                <!-- Meta Information about Page -->
                <meta charset=\"utf-8\"/>
                <meta name=\"AUTHOR\"      content=\"Brndon Tobin\"/>
                <meta name=\"keywords\"    content=\"HTML, Projects\"/>
                <meta name=\"description\" content=\"View Event \"/>

                <!-- ALL CSS FILES -->
                <!-- Bootstrap Core CSS -->
                <link href=\"../../../../Resources/Bootstrap/bootstrap-3.3.6-dist/css/bootstrap.css\" rel=\"stylesheet\">

            </head>

            <body>

                <div class=\"container - fluid\">
                    <div class=\"row\">
                        <div class=\"col-sm-0 col-md-1 col-lg-2\"></div>
                        <div class=\"col-sm-12 col-md-10 col-lg-8\">

                            <h1>View Event</h1>

                            <p>Name: $event->author_Name</p>
                            <p>Username: $event->author_Username</p>
                            <p>Organization: $event->author_Organization</p>
                            <p>Event Name: $event->event_Name</p>
                            <p>Event Date: $event->event_Date</p>
                            <p>Event Description: $event->event_Description</p>
                            <p>Event Location: $event->event_Location</p>

                            <div class=\"container\">
                                <div id=\"content\">
                                    <ul id=\"tabs\" class=\"nav nav-tabs\" data-tabs=\"tabs\">
                                        <li class=\"active\"><a href=\"#red\" data-toggle=\"tab\">Red</a></li>
                                        <li><a href=\"#orange\" data-toggle=\"tab\">Orange</a></li>
                                        <li><a href=\"#yellow\" data-toggle=\"tab\">Yellow</a></li>
                                        <li><a href=\"#green\" data-toggle=\"tab\">Green</a></li>
                                        <li><a href=\"#blue\" data-toggle=\"tab\">Blue</a></li>
                                    </ul>
                                    <div id=\"my-tab-content\" class=\"tab-content\">
                                        <div class=\"tab-pane active\" id=\"red\">
                                            <h1>Invited</h1>
                                            <div class=\"table - responsive\">
                                                <table class=\"table table - striped table - bordered table - condensed\">
                                                    <tr>
                                                        <th>Name:</th>
                                                    </tr>";
                                                    // Echo out all entries in student array
                                                    foreach ($event->invited_event as $row)
                                                    {
                                                        echo "<tr><td>$row</td></tr>";
                                                    }
                                                echo "</table>
                                            </div>
                                        </div>
                                        <div class=\"tab-pane\" id=\"orange\">
                                            <h1>Orange</h1>
                                            <p>orange orange orange orange orange</p>
                                        </div>
                                        <div class=\"tab-pane\" id=\"yellow\">
                                            <h1>Yellow</h1>
                                            <p>yellow yellow yellow yellow yellow</p>
                                        </div>
                                        <div class=\"tab-pane\" id=\"green\">
                                            <h1>Green</h1>
                                            <p>green green green green green</p>
                                        </div>
                                        <div class=\"tab-pane\" id=\"blue\">
                                            <h1>Blue</h1>
                                            <p>blue blue blue blue blue</p>
                                        </div>
                                    </div>
                                </div>
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