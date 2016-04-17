<?php
/**
 * Created by PhpStorm.
 * User: Fumiko
 * Date: 4/14/2016
 * Time: 11:35 PM
 */

echo "
        <!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\" \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">

        <html lang=\"en\">

            <head>

                <!-- Last Updated Spring 2016 -->
                <!-- Brandon Tobin -->
                <!-- University of Utah -->

                <!-- New Due Process Form for $form->student_Name  -->

                <title>Due Process Form</title>

                <!-- Meta Information about Page -->
                <meta charset=\"utf-8\"/>
                <meta name=\"AUTHOR\"      content=\"Brndon Tobin\"/>
                <meta name=\"keywords\"    content=\"HTML, Projects\"/>
                <meta name=\"description\" content=\"New Due Process Form for $form->student_Name\"/>

                <!-- ALL CSS FILES -->
                <!--<link rel=\"stylesheet\" href=\"../../../../Resources/css/stylesheet.css\" type=\"text/css\"/> -->
                <!-- Bootstrap Core CSS -->
                <link href=\"../../../../Resources/Bootstrap/bootstrap-3.3.6-dist/css/bootstrap.css\" rel=\"stylesheet\">

            </head>

            <body>

            <h1>Welcome!</h1>

            <form>
              <div class=\"form-group\">
                <label for=\"username\">Username</label>
                <input type=\"text\" class=\"form-control\" id=\"username\" placeholder=\"username\">
              </div>
              <div class=\"form-group\">
                <label for=\"password\">Password</label>
                <input type=\"password\" class=\"form-control\" id=\"password\" placeholder=\"Password\">
              </div>
              <div class=\"form-group\">
                <label for=\"organization\">Greek Organization</label>
                <select class=\"form-control\" id='organization'>
                      <option>Alpha Chi Omega</option>
                      <option>Alpha Phi</option>
                      <option>Chi Omega</option>
                      <option>Delta Gamma</option>
                      <option>Delta Sigma Phi</option>
                      <option>Kappa Delta Chi</option>
                      <option>Kappa Kappa Gamma</option>
                      <option>Kappa Sigma</option>
                      <option>Omega Delta Phi</option>
                      <option>Phi Delta Theta</option>
                      <option>Pi Beta Phi</option>
                      <option>Pi Kappa Alpha</option>
                      <option>Sigma Chi</option>
                      <option>Sigma Nu</option>
                      <option>Sigma Phi Epsilon</option>
                      <option>Triangle</option>
                </select>
              </div>
              <button type=\"submit\" class=\"btn btn-default\">Create Account</button>
            </form>

            <a class=\"btn btn-default\" href=\"index.php\" role=\"button\">Log In</a>

            </body>
        </html>";






