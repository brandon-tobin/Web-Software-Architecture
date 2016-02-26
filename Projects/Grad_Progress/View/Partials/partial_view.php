<?php

/**
 * This file contains the partial views for simplifying the code in the main view files.
 */

function getHeader()
{
    return "
    <!-- Header -->
    <div id=\"header\">
        <img src=\"../../../../Resources/Images/uofufootball.jpg\" alt=\"Rice Eccles Stadium\" />
        <h1>University of Utah - CS 4540</h1>
        <h2>Web Software Architecture - Spring 2016</h2>
        <h2>Brandon Tobin</h2>
        <h2>Grad Progress - Assignment 5</h2>
    </div>";
}

function getNavigation()
{
    return "
    <!-- Navigation Bar -->
    <ul id=\"navigation\">
        <li><a href=\"../../../../index.html\">Home</a></li>
        <li><a href=\"../../../../Projects/\">Projects</a></li>
        <li><a href=\"../../../../Class_Examples/\">Examples</a></li>
    </ul>";
}

function getNavBar($role)
{
    if (in_array('dgs', $role))
    {
        return "
        <!-- Nav Bar -->
        <ul id=\"navBar\">
            <li><a>Welcome ".$_SESSION['realname']."</a></li>
            <li><a href=\"../Account/account_home.php\">Account Home</a></li>
            <li><a href=\"../DGS/overview.php\">View Students and Advisors</a></li>
            <li><a href=\"../DGS/change_role.php\">Change User Role</a></li>
            <li><a href=\"../Account/logout.php\">Logout</a></li>
        </ul>";
    }
    else if (in_array('faculty', $role))
    {

    }
    else if (in_array('staff', $role))
    {

    }
    else if (in_array('student', $role))
    {
        return "
        <!-- Nav Bar -->
        <ul id=\"navBar\">
            <li><a>Welcome ".$_SESSION['realname']."</a></li>
            <li><a href=\"../Account/account_home.php\">Account Home</a></li>
            <li><a href=\"../Student/update_information.php\">Update Information</a></li>
            <li><a href=\"../Student/student_forms.php?id=".$_SESSION['userid']."\">View Forms</a></li>
            <li><a href=\"../Account/logout.php\">Logout</a></li>
        </ul>";
    }
    else
    {
        return "
        <form method=\"post\">
        <!-- Nav Bar -->
        <ul id=\"navBar\">
            <li>Welcome Please Login To Continue</li>
            <li><label for=\"username\">Username</label></li>
            <li><input type=\"text\" size=\"20\" name=\"username\" id=\"username\" /></li>
            <li><label for=\"password\">Password</label></li>
            <li><input type=\"password\" size=\"20\" name=\"password\" id=\"password\" /></li>
            <li><a><input type=\"submit\" value=\"Submit\" /></li>
        </ul>
        </form>";


    }

    if (isset($_REQUEST['submit']))
    {
        error_log("Made it here!!!!!!!!!!!!!");
    }


}

function pageDataHeader($title)
{
    return "<h1 class=\"form-header\">$title</h1>";
}
