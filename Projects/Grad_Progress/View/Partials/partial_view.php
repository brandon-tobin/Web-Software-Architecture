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
            <li>Welcome ".$_SESSION['realname']."</li>
            <li><a href=\"../Account/account_home.php\">Account Home</a></li>
            <li><a href=\"../DGS/overview.php\">View Students and Advisors</a></li>
            <li><a href=\"../DGS/change_role.php\">Change User Role</a></li>
            <li><a href=\"../Account/logout.php\">Logout</a></li>
        </ul>";
    }
    else if (in_array('faculty', $role))
    {
        return "
        <!-- Nav Bar -->
        <ul id=\"navBar\">
            <li>Welcome ".$_SESSION['realname']."</li>
            <li><a href=\"../Account/account_home.php\">Account Home</a></li>
            <li><a href=\"../Advisor/students.php\">View Students</a></li>
            <li><a href=\"../Account/logout.php\">Logout</a></li>
        </ul>";
    }
    else if (in_array('staff', $role))
    {

    }
    else if (in_array('student', $role))
    {
        return "
        <!-- Nav Bar -->
        <ul id=\"navBar\">
            <li><Welcome ".$_SESSION['realname']."</li>
            <li><a href=\"../Account/account_home.php\">Account Home</a></li>
            <li><a href=\"../Student/update_information.php\">Update Information</a></li>
            <li><a href=\"../Student/student_forms.php?id=".$_SESSION['userid']."\">View Forms</a></li>
            <li><a href=\"../Student/student_status.php?id=".$_SESSION['userid']."\">Student Status</a></li>
            <li><a href=\"../Student/student_status_update.php?id=".$_SESSION['userid']."\">Update Student Status</a></li>
            <li><a href=\"../Account/logout.php\">Logout</a></li>
        </ul>";
    }
    else if (in_array('register', $role))
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
            <li><a><input type=\"submit\" name=\"submit\" value=\"Submit\" /></li>
        </ul>
        </form>";
    }
    else
    {
        require ('../Model/Functions/db.php');
        require ('../Model/Functions/authentication.php');

        if (isset($_REQUEST['submit']) && isset($_REQUEST['username']) && isset($_REQUEST['password']))
        {
            navBar_Login('');
        }

        return "
        <form method=\"post\">
        <!-- Nav Bar -->
        <ul id=\"navBar\">
            <li>Welcome Please Login To Continue</li>
            <li><label for=\"username\">Username</label></li>
            <li><input type=\"text\" size=\"20\" name=\"username\" id=\"username\" /></li>
            <li><label for=\"password\">Password</label></li>
            <li><input type=\"password\" size=\"20\" name=\"password\" id=\"password\" /></li>
            <li><a><input type=\"submit\" name=\"submit\" value=\"Submit\" /></li>
        </ul>
        </form>";
    }
}

function pageDataHeader($title)
{
    return "<h1 class=\"form-header\">$title</h1>";
}
