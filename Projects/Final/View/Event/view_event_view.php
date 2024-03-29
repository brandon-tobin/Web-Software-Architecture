<?php

require('../../View/Partials/partial_view.php');

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

                            <h1 class=\"page-header\">View Event</h1>

                            <div class=\"panel panel-primary\">
                                <div class=\"panel-heading\">Event Information:</div>
                                <div class=\"panel-body\">
                                    <b>Event Name:</b> $event->event_Name <br />
                                    <b>Event Date:</b> $event->event_Date <br />
                                    <b>Event Location:</b> $event->event_Location <br />
                                    <b>Event Description:</b> $event->event_Description <br /><br />

                                    <b>Name:</b> $event->author_Name <br />
                                    <b>Organization:</b> $event->author_Organization <br />
                                </div>
                            </div>

                            <!-- Attending Button Group -->
                            <form method=\"post\">
                            <div class=\"btn-group btn-group-lg\" role=\"group\">
                                <button type=\"submit\" class=\"btn btn-success\" name=\"Attending\" value=\"Attending\">Attending</button>
                                <button type=\"submit\" class=\"btn btn-warning\" name=\"Maybe\" value=\"Maybe Attending\">Maybe Attending</button>
                                <button type=\"submit\" class=\"btn btn-danger\" name=\"Not\" value=\"Not Attending\">Not Attending</button>
                            </div>
                            </form>

                            <br /><br />

                            <!--<div class=\"container\">-->
                            <div id=\"content\">
                                <ul id=\"tabs\" class=\"nav nav-tabs\" data-tabs=\"tabs\">
                                    <li class=\"active\"><a href=\"#invited\" data-toggle=\"tab\">Invited</a></li>
                                    <li><a href=\"#attending\" data-toggle=\"tab\">Attending (".count($event->attending_event).")</a></li>
                                    <li><a href=\"#maybeAttending\" data-toggle=\"tab\">Maybe Attending (".count($event->maybe_attending_event).")</a></li>
                                    <li><a href=\"#notAttending\" data-toggle=\"tab\">Not Attending (".count($event->not_attending_event).")</a></li>
                                </ul>
                                <div id=\"my-tab-content\" class=\"tab-content\">
                                    <div class=\"tab-pane active\" id=\"invited\">
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
                                    <div class=\"tab-pane\" id=\"attending\">";
                                        echo "<h1>Attending (". count($event->attending_event) .")</h1>
                                        <div class=\"table - responsive\">
                                            <table class=\"table table - striped table - bordered table - condensed\">
                                                <tr>
                                                    <th>Name:</th>
                                                </tr>";
                                                // Echo out all entries in student array
                                                foreach ($event->attending_event as $row)
                                                {
                                                    echo "<tr><td>$row</td></tr>";
                                                }
                                            echo "</table>
                                        </div>
                                    </div>
                                    <div class=\"tab-pane\" id=\"maybeAttending\">";
                                        echo "<h1>Maybe Attending (". count($event->maybe_attending_event) . ")</h1>
                                        <div class=\"table - responsive\">
                                            <table class=\"table table - striped table - bordered table - condensed\">
                                                <tr>
                                                    <th>Name:</th>
                                                </tr>";
                                                // Echo out all entries in student array
                                                foreach ($event->maybe_attending_event as $row)
                                                {
                                                    echo "<tr><td>$row</td></tr>";
                                                }
                                            echo "</table>
                                        </div>
                                    </div>
                                    <div class=\"tab-pane\" id=\"notAttending\">";
                                        echo "<h1>Not Attending (". count($event->not_attending_event) . ")</h1>
                                        <div class=\"table - responsive\">
                                            <table class=\"table table - striped table - bordered table - condensed\">
                                                <tr>
                                                    <th>Name:</th>
                                                </tr>";
                                                // Echo out all entries in student array
                                                foreach ($event->not_attending_event as $row)
                                                {
                                                    echo "<tr><td>$row</td></tr>";
                                                }
                                                echo "</table>
                                        </div>
                                    </div>
                                </div>

                                <h2>Comments:</h2>
                                <div class=\"table-responsive\">
                                    <table class=\"table table-striped table-bordered table-condensed\">
                                        <tr>
                                            <th>Name:</th>
                                            <th>Time:</th>
                                            <th>Comment:</th>
                                        </tr>";
                                        // Echo out all entries in student array
                                        foreach ($event->event_comments as $row)
                                        {
                                            echo "<tr>";
                                            foreach ($row as $value)
                                            {
                                                echo "<td>$value</td>";
                                            }
                                            echo "</tr>";
                                        }
                                        echo "
                                    </table>
                                </div>

                                <!-- Comment Form -->
                                <h2>Leave a Comment</h2>
                                <form method=\"post\">
                                    <div class=\"form-group\">
                                        <label for=\"comment\">Comment:</label>
                                        <textarea class=\"form-control\" rows=\"5\" name=\"comment\" id=\"comment\"></textarea>
                                    </div>
                                    <button type=\"submit\" class=\"btn btn-primary\" name=\"Post\" value=\"Post\">Post</button>
                                </form>
                            </div>
                        </div>
                        <div class=\"col-sm-0 col-md-1 col-lg-2\"></div>
                    </div>
                </div>

                <!-- jQuery -->
                <script src=\"../../../../Resources/Bootstrap/bootstrap-3.3.6-dist/js/jquery.js\"></script>

                <!-- Bootstrap Core JavaScript -->
                <script src=\"../../../../Resources/Bootstrap/bootstrap-3.3.6-dist/js/bootstrap.min.js\"></script>

            </body>
        </html>";