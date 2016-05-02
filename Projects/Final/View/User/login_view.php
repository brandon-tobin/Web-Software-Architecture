<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html lang="en">

    <head>

        <!-- Last Updated Spring 2016 -->
        <!-- Fumiko Anne Aoki -->
        <!-- University of Utah -->

        <!-- Login Page  -->

        <title>Login</title>

        <!-- Meta Information about Page -->
        <meta charset="utf-8"/>
        <meta name="AUTHOR"      content="Fumiko Anne Aoki"/>
        <meta name="keywords"    content="HTML, Projects"/>
        <meta name="description" content="Landing page for logging in"/>

        <!-- Bootstrap Core CSS -->
        <link href="../../../../Resources/Bootstrap/bootstrap-3.3.6-dist/css/bootstrap.css" rel="stylesheet">

    </head>

    <body>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-0 col-md-1 col-lg-2"></div>
                <div class="col-sm-12 col-md-10 col-lg-8">

                    <p id="error"><?php echo $message ?></p>

                    <form method="post">
                        <table>
                            <tr>
                                <td><label for="username">Username</label></td>
                                <td><input type="text" size="20" name="username" id="username" /></td>
                            </tr>
                            <tr>
                                <td><label for="password">Password</label></td>
                                <td><input type="password" size="20" name="password" id="password" /></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" value="Submit" /></td>
                            </tr>
                        </table>
                    </form>

                </div>
                <div class="col-sm-0 col-md-1 col-lg-2"></div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="../../../Resources/Bootstrap/bootstrap-3.3.6-dist/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../../../Resources/Bootstrap/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>

    </body>
</html>
