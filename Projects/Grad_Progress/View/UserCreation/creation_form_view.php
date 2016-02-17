
<!--/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * Progress Form View -- View for displaying the student's form
 *
 */-->

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

        <html lang="en">

            <head>

                <!-- Last Updated Spring 2016 -->
                <!-- Brandon Tobin -->
                <!-- University of Utah -->

                <!-- Due Process Form for $form->student_Name  -->

                <title>Account Creation</title>

                <!-- Meta Information about Page -->
                <meta charset="utf-8"/>
                <meta name="AUTHOR"      content="Brndon Tobin"/>
                <meta name="keywords"    content="HTML, Projects"/>
                <meta name="description" content="Due Process Form for $form->student_Name"/>

                <!-- ALL CSS FILES -->
                <link rel="stylesheet" href="../../../../Resources/css/stylesheet.css" type="text/css"/>

            </head>

            <body>

                <!-- Header -->
                <div id="header">
                    <img src="/Resources/Images/uofufootball.jpg" alt="Rice Eccles Stadium" />
                    <h1>University of Utah - CS 4540</h1>
                    <h2>Web Software Architecture - Spring 2016</h2>
                    <h2>Brandon Tobin</h2>
                    <h2>Grad Progress - Assignment 3</h2>
                </div>

                <!-- Navigation Bar -->
                <ul id="navigation">
                    <li><a href="../../../../index.html">Home</a></li>
                    <li><a href="../../../">Projects</a></li>
                    <li><a href="../../../../Class_Examples">Examples</a></li>
                </ul>

                <h1 class="form-header">New User Creation Form</h1>

                <p>Please fill in the information below to register for a new user account.</p>

                <!-- Creation form for new user -->
                <form method="post" action="">
                    <table>
                        <tr>
                            <td><label for="name">Full Name:</label></td>
                            <td><input type="text" name="name" id="name" required/></td>
                            <td><span style="color:red"><?php echo $nameError ?></span></td>
                        </tr>
                        <tr>
                            <td><label for="uid">uID Number</label></td>
                            <td><input type="text" size="20" name="uid" id="uid" placeholder="0123456" /></td>
                            <td><span style="color:red"><?php echo $uidError ?></span></td>

                        </tr>
                        <tr>
                            <td><label for="username">Username:</label></td>
                            <td><input type="text" size="20" name="username" id="username" /></td>
                            <td><span style="color:red"><?php echo $loginError ?></span></td>
                        </tr>
                        <tr>
                            <td><label for="password">Password</label></td>
                            <td><input type="password" size="20" name="password" id="password" /></td>
                            <td><span style="color:red"><?php echo $passwordError ?></span></td>
                        </tr>
                        <tr>
                            <td><label for="password">Confirm Password</label></td>
                            <td><input type="password" size="20" name="confirmedPassword" id="confirmedPassword" /></td>
                            <td><span style="color:red"><?php echo $confirmedPasswordError ?></span></td>
                        </tr>
                        <tr>
                            <td><label for="selection_box">Please select account type.</label></td>
                            <td>
                                <select name="account_type" id="account_type">
                                    <option value="S">Student</option>
                                    <option value="F">Faculty</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <p>Only continue filling in information if you are a student</p>
                    <table>
                        <tr>
                            <td><label for="degree">Degree:</label></td>
                            <td><input type="radio" name="degree" value="Computer Science" checked>Computer Science</td>
                            <td><input type="radio" name="degree" value="Computing">Computing</td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" value="Submit" /></td>
                        </tr>
                    </table>
                </form>
            </body>
        </html>
