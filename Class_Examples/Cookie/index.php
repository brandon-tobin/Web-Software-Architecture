
<?php
  /**
   * Author: H. James de St. Germain
   * Date:   Spring 2016
   *
   * Simple example of using/setting/displaying cookies and their info
   *
   */

if (isset($_GET['clear_cookies']))
  {
    echo "Clearing Cookies";
    foreach ($_COOKIE as $key => $value)
      {
	setcookie($key, $value, time() - 60*60*24); // expired a day ago
      }
  }

if (isset($_GET['set_cookie']) && $_GET['set_cookie']==1)
  {
    echo "Set a cookie";
    setcookie("JIMSCOOKIE", "100", time()+100000);
  }

if (isset($_GET['set_cookie']) && $_GET['set_cookie']==2)
  {
    echo "Set another cookie";

    setcookie("AnotherCookie", "happy birthday to me", time()+1000);
  }

if (count($_COOKIE) > 0)
  {
    // print out all the cookies
    $cookie = "<ol>";
    
    foreach ($_COOKIE as $key => $value)
      {
	$cookie .= "<li>" . $key . " &rarr; " . $value . "</li>\n";
      }
    
    $cookie .= "</ol>";
  }
else
  {
    $cookie = "No Cookies for You!";
  }
    
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"> 

<html lang="en"> 
  <head>

    <!-- Last Updated Spring 2016 --> 
    <!-- H. James de St. Germain --> 
    <!-- University of Utah --> 

    <title> Cookies For All </title> 

    <!-- Meta Information about Page -->
    <meta charset="utf-8"/>
    <meta name="AUTHOR"      content="H. James de St. Germain"/>
    <meta name="keywords"    content="PHP Cookies"/>
    <meta name="description" content="Basic examples of cookie use"/>

  </head> 
 
  <body> 
 
    <h1> Welcome to my web page </h1>

    <?php echo $cookie; ?>

  </body>
</html>
