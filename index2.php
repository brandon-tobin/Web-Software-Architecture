<link href="../../../../Resources/Bootstrap/bootstrap-3.3.6-dist/css/bootstrap.css" rel="stylesheet">

<div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
<?php 
echo "
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
                            <a href=\"../Account/logout.php\">Logout</a></a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>";
?>

</div>
</div>
</div>
