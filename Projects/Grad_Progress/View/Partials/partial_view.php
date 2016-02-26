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

function getNavBar()
{
    return "
    <!-- Nav Bar -->
    <ul id=\"navBar\">
        <li><a href=\"../../Controller/Account/account_home.php\">Account Home</a></li>
    </ul>";

}

function pageDataHeader($title)
{
    return "<h1 class=\"form-header\">$title</h1>";
}
