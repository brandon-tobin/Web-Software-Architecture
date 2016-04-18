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

                <!-- New Due Process Form for   -->

                <title>Due Process Form</title>

                <!-- Meta Information about Page -->
                <meta charset=\"utf-8\"/>
                <meta name=\"AUTHOR\"      content=\"Brndon Tobin\"/>
                <meta name=\"keywords\"    content=\"HTML, Projects\"/>
                <meta name=\"description\" content=\"New Due Process Form for \"/>

                <!-- ALL CSS FILES -->
                <!--<link rel=\"stylesheet\" href=\"../../../../Resources/css/stylesheet.css\" type=\"text/css\"/> -->
                <!-- Bootstrap Core CSS -->
                <link href=\"../../../../Resources/Bootstrap/bootstrap-3.3.6-dist/css/bootstrap.css\" rel=\"stylesheet\">

            </head>

            <body>

                <h1>Create New Event</h1>

                <p>Name: $event->author_Name</p>
                <p>Username: $event->author_Username</p>
                <p>Organization: $event->author_Organization</p>

                <form method='post'>
                    <div class='form-group'>
                        <label for='title'>Event Title:</label>
                        <input type='text' name='title' class='form-control'>
                    </div>
                    <div class='form-group'>
                        <label for='date'>Date:</label>
                        <input type='date' name='date' placeholder='YYYY-MM-DD HH:MM:SS' class='form-control'>
                    </div>
                    <div class='form-group'>
                        <label for='location'>Location:</label>
                        <input type='text' name='location' class='form-control'>
                    </div>
                    <div class='form-group'>
                        <label for='description'>Description:</label>
                        <input type='text' name='description' class='form-control'>
                    </div>
                    <div class='form-group'>
                        <label for='attend'>Who Can Attend:</label>
                        <select multiple class='form-control' name='attend'>
                            <option>Beta Theta Pi</option>
                            <option>Delta Sigma Phi</option>
                            <option>Kappa Sigma</option>
                            <option>Phi Delta Theta</option>
                            <option>Pi Kappa Alpha</option>
                            <option>Sigma Chi</option>
                            <option>Sigma Nu</option>
                            <option>Sigma Phi Epsilon</option>
                            <option>Triangle</option>
                            <option>Alpha Chi Omega</option>
                            <option>Alpha Phi</option>
                            <option>Chi Omega</option>
                            <option>Delta Gamma</option>
                            <option>Kappa Kappa Gamma</option>
                            <option>Pi Beta Phi</option>
                          </select>
                    </div>

                    <input type='submit' class='btn btn-info' value='Submit'>

                </form>

            </body>
            </html>";