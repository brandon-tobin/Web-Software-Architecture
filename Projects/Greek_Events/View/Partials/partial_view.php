<?php

/**
 * This file contains the partial views for simplifying the code in the main view files.
 */

function getHeader()
{
    return "
    <!-- Header -->
    <div id=\"header\">
        <h1>University of Utah - CS 4540</h1>
        <h2>Web Software Architecture - Spring 2016</h2>
        <h2>Brandon Tobin</h2>
        <h2>Grad Progress - Assignment 7</h2>
    </div>";
}

function getNavigation()
{
    return "

    <nav class=\"navbar navbar-default navbar-inverse topnav \" role=\"navigation\">
        <div class=\"container topnav\">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class=\"navbar-header\">
                <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\">
                    <span class=\"sr-only\">Toggle navigation</span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                </button>
                <a class=\"navbar-brand topnav\" href=\"#\">Website Links</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
                <ul class=\"nav navbar-nav\">
                    <li>
                        <a href=\"../../../../index.html\">Home</a>
                    </li>
                    <li>
                        <a href=\"../../../../Projects/\">Projects</a>
                    </li>
                    <li>
                        <a href=\"../../../../Class_Examples/\">Examples</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>";
}

function getNavBarWithoutRoles()
{
    echo "
    <!-- Static navbar -->
    <nav class=\"navbar navbar-default navbar-static-top\">
      <div class=\"container\">
        <div class=\"navbar-header\">
          <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#navbar\" aria-expanded=\"false\" aria-controls=\"navbar\">
            <span class=\"sr-only\">Toggle navigation</span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
          </button>
          <a class=\"navbar-brand\" href=\"#\">Greek Events</a>
        </div>
        <div id=\"navbar\" class=\"navbar-collapse collapse\">
          <ul class=\"nav navbar-nav\">
            <li class=\"active\"><a href=\"#\">Home</a></li>
            <li><a href=\"#about\">About</a></li>
            <li><a href=\"#contact\">Contact</a></li>
            <li class=\"dropdown\">
              <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">Dropdown <span class=\"caret\"></span></a>
              <ul class=\"dropdown-menu\">
                <li><a href=\"#\">Action</a></li>
                <li><a href=\"#\">Another action</a></li>
                <li><a href=\"#\">Something else here</a></li>
                <li role=\"separator\" class=\"divider\"></li>
                <li class=\"dropdown-header\">Nav header</li>
                <li><a href=\"#\">Separated link</a></li>
                <li><a href=\"#\">One more separated link</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>";
}


function getNavBar($role)
{
    if (in_array('dgs', $role))
    {
        return "

     <!-- Navigation -->
    <nav class=\"navbar navbar-custom \" role=\"navigation\">
        <div class=\"container\">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class=\"navbar-header\">
                <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-2\">
                    <span class=\"sr-only\">Toggle navigation</span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                </button>
                <a class=\"navbar-brand\" href=\"#\">Welcome ".$_SESSION['realname']."</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-2\">
                <ul class=\"nav navbar-nav\">
                    <li>
                        <a href=\"../Account/account_home.php\">Account Home</a>
                    </li>
                    <li>
                        <a href=\"../DGS/overview.php\">View Students and Advisors</a>
                    </li>
                    <li>
                        <a href=\"../DGS/change_role.php\">Change User Role</a>
                    </li>
                    <li>
                        <a href=\"../Account/logout.php\">Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>";
    }
    else if (in_array('faculty', $role))
    {
        return "

        <!-- Navigation -->
        <nav class=\"navbar navbar-custom \" role=\"navigation\">
            <div class=\"container\">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class=\"navbar-header\">
                    <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\">
                        <span class=\"sr-only\">Toggle navigation</span>
                        <span class=\"icon-bar\"></span>
                        <span class=\"icon-bar\"></span>
                        <span class=\"icon-bar\"></span>
                    </button>
                    <a class=\"navbar-brand\" href=\"#\">Welcome ".$_SESSION['realname']."</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
                    <ul class=\"nav navbar-nav\">
                        <li>
                            <a href=\"../Account/account_home.php\">Account Home</a>
                        </li>
                        <li>
                            <a href=\"../Advisor/students.php?id=".$_SESSION['userid']."\">View Students</a>
                        </li>
                        <li>
                            <a href=\"../Account/logout.php\">Logout</a></a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>";
    }
    else if (in_array('staff', $role))
    {

    }
    else if (in_array('student', $role))
    {
        return "
        <!-- Navigation -->
        <nav class=\"navbar navbar-custom \" role=\"navigation\">
            <div class=\"container-fluid\">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class=\"navbar-header\">
                    <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\">
                        <span class=\"sr-only\">Toggle navigation</span>
                        <span class=\"icon-bar\"></span>
                        <span class=\"icon-bar\"></span>
                        <span class=\"icon-bar\"></span>
                    </button>
                    <a class=\"navbar-brand\" href=\"#\">Welcome ".$_SESSION['realname']."</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
                    <ul class=\"nav navbar-nav\">
                        <li>
                            <a href=\"../Account/account_home.php\">Account Home</a>
                        </li>
                        <li>
                            <a href=\"../Student/update_information.php\">Update Information</a>
                        </li>
                        <li>
                            <a href=\"../Student/student_forms.php?id=".$_SESSION['userid']."\">View Forms</a>
                        </li>
                        <li>
                            <a href=\"../Student/student_status.php?id=".$_SESSION['userid']."\">Student Status</a>
                        </li>
                        <li>
                            <a href=\"../Student/student_status_update.php?id=".$_SESSION['userid']."\">Update Student Status</a>
                        </li>
                        <li>
                            <a href=\"../Account/logout.php\">Logout</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>";
    }
    else if (in_array('register', $role))
    {

    }
    else
    {

    }
}

function pageDataHeader($title)
{
    return "
    <div class=\"page-header\">
        <h1 class=\"form-header\">$title</h1>
    </div>";
}
