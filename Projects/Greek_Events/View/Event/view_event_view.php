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

                            <!-- Attendance Pills -->
                                <ul id=\"tabs\" class=\"nav nav-tabs\" data-tabs=\"tabs\">
                                <li class=\"active\"><a href=\"tab1\" data-toggle=\"tab\">Invited</a></li>
                                <li><a href=\"tab2\" data-toggle=\"tab\">Attending</a></li>
                                <li><a href=\"tab3\" data-toggle=\"tab\">Maybe Attending</a></li>
                                <li><a href=\"tab4\" data-toggle=\"tab\">Not Attending</a></li>
                            </ul>

                            <div id=\"my-tab-content\" class=\"tab-content\">

                                <div class=\"tab-pane\" id=\"tab1\">
                                    1
                                </div>
                                <div class=\"tab-pane\" id=\"tab2\">
                                    2
                                </div>
                                <div class=\"tab-pane\" id=\"tab3\">
                                    3
                                </div>
                                <div class=\"tab-pane\" id=\"tab4\">
                                    4
                                </div>
                            </div>


                        </div>
                        <div class=\"col-sm-0 col-md-1 col-lg-2\"></div>
                    </div>
                </div>

            </body>
        </html>";