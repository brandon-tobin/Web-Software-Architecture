<?php
/**
 * Created by PhpStorm.
 * User: Fumiko
 * Date: 5/1/2016
 * Time: 3:24 AM
 */

require('../../View/Partials/partial_view.php');

echo "
        <!DOCTYPE html PUBLIC \" -//W3C//DTD XHTML 1.1//EN\" \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">

        <html lang = \"en\" >

            <head >

                <!--Last Updated Spring 2016-->
                <!--Fumiko Anne Aoki-->
                <!--University of Utah-->

                <!--Success-->

                <title > Success </title >

                <!--Meta Information about Page-->
                <meta charset = \"utf-8\" />
                <meta name = \"AUTHOR\"      content = \"Brndon Tobin\" />
                <meta name = \"keywords\"    content = \"HTML, Projects\" />
                <meta name = \"description\" content = \"Success \" />

                <!--Bootstrap Core CSS-->
                <link href = \"../../../../Resources/Bootstrap/bootstrap-3.3.6-dist/css/bootstrap.css\" rel = \"stylesheet\" >

            </head >

            <body>

                <div class=\"container - fluid\">
                    <div class=\"row\">
                        <div class=\"col - sm - 0 col - md - 1 col - lg - 2\"></div>
                        <div class=\"col - sm - 12 col - md - 10 col - lg - 8\">";

                            echo getNavBarWithoutRoles();

                            echo "

                            <h1 class='page-header'>Create New Event</h1>

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
                                    <input type='text' name='date' placeholder='YYYY-MM-DD HH:MM:SS' class='form-control'>
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
                                    <label for='attend[]'>Who Can Attend:</label>
                                    <select multiple size='5' class='form-control' name='attend[]'>
                                        <option value='1'>Beta Theta Pi</option>
                                        <option value='2'>Delta Sigma Phi</option>
                                        <option value='3'>Kappa Sigma</option>
                                        <option value='4'>Phi Delta Theta</option>
                                        <option value='5'>Pi Kappa Alpha</option>
                                        <option value='6'>Sigma Chi</option>
                                        <option value='7'>Sigma Nu</option>
                                        <option value='8'>Sigma Phi Epsilon</option>
                                        <option value='9'>Triangle</option>
                                        <option value='10'>Alpha Chi Omega</option>
                                        <option value='11'>Alpha Phi</option>
                                        <option value='12'>Chi Omega</option>
                                        <option value='13'>Delta Gamma</option>
                                        <option value='14'>Kappa Kappa Gamma</option>
                                        <option value='15'>Pi Beta Phi</option>
                                      </select>
                                </div>

                                <input type='submit' class='btn btn-info' name='submit' value='Submit'>

                                <h1>Success!</h1>

                            <a class=\"btn btn-default\" href=\"../User/home.php\" role=\"button\">Go to Homepage</a>

                            </form>
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