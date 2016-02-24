<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
echo "
    <!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\" \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">

    <html lang=\"en\">

    <head>

        <!-- Last Updated Spring 2016 -->
        <!-- Brandon Tobin -->
        <!-- University of Utah -->

        <!-- Account Home View  -->

        <title>Account Home</title>

        <!-- Meta Information about Page -->
        <meta charset=\"utf-8\"/>
        <meta name=\"AUTHOR\"      content=\"Brndon Tobin\"/>
        <meta name=\"keywords\"    content=\"HTML, Projects\"/>
        <meta name=\"description\" content=\"Landing page for successful account creation\"/>

        <!-- ALL CSS FILES -->
        <link rel=\"stylesheet\" href=\"../../../../Resources/css/stylesheet.css\" type=\"text/css\"/>

    </head>

    <body>

    <!-- Header -->
    <div id=\"header\">
        <img src=\"/Resources/Images/uofufootball.jpg\" alt=\"Rice Eccles Stadium\" />
        <h1>University of Utah - CS 4540</h1>
        <h2>Web Software Architecture - Spring 2016</h2>
        <h2>Brandon Tobin</h2>
        <h2>Grad Progress - Assignment 4</h2>
    </div>

    <!-- Navigation Bar -->
    <ul id=\"navigation\">
        <li><a href=\"../../../../index.html\">Home</a></li>
        <li><a href=\"../../../\">Projects</a></li>
        <li><a href=\"../../../../Class_Examples\">Examples</a></li>
        <li><a href=\"../DGS/overview.php\">DGS Overview</a></li>
    </ul>

    <h1 class=\"form-header\">Welcome Back "; echo $_SESSION['realname']; echo "</h1>
    <h1 class=\"form-header\">Account Home</h1>

    <p>Please click on one of the links below to perform an action.</p>";

    if (in_array("student", $_SESSION['roles']))
    {
        echo "
        <ul>
            <li>Update Advisor</li>
            <li>Update Committee</li>
            <li>View your forms</li>
        </ul>";
    }

    if (in_array("advisor", $_SESSION['roles']))
    {
        echo "<p>Click here to view your students</p>";
    }

    if (in_array("dgs", $_SESSION['roles']))
    {
        echo "
        <ul>
            <li><a href=\"../DGS/overview.php\">View Students and Advisors</a></li>
            <li>Update a User's Role</li>
        </ul>";
    }

    echo "


    </body>
</html>
";