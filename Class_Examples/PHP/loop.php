<!DOCTYPE html>

<!--
      Author: Zachary
      Modified by: H. James de St. Germain  -  Spring 2014

      Important Notes:

        1) Notice use of arrays and the getallheaders function
        2) Notice use of foreach key/value pair loop

-->

<html>
  <head>
    <title>Loop Example</title>
  </head>
  
  <body>
    
    <?php 

// Array of all headers that came from browser
// Note that arrays are actually maps
$headers = getallheaders();

// Creating an array with indexes 0, 1, 2, 5, and 6
$myarray = array("a", "b", "c", 5 => "d", "e");

// Adding an index 'joe"
$myarray["joe"] = "zachary";

// Appending "f" with index 7
$myarray[] = "d";



// Ugly display of the array
$output = print_r($myarray,true);
echo("<h2>The default print_r representation of an array</h2>
      <p>$output</p>");

// Using A Loop

echo("<h2>Basic For Loop Printout of an Array</h2>");


for ($i=0;$i<count($myarray);$i++)
  {
    echo ("<p>myarray[\$i] is $myarray[$i]</p>");
  }
?>



<h2>Same using an ordered list</h2>

<ol>

<?php

for ($i=0;$i<count($myarray);$i++)
  {
    echo ("<li>myarray[$i] is $myarray[$i]</li>");
  }
?>
</ol>
  
    
  </body>
</html>