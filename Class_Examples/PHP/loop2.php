<!DOCTYPE html>
<!--
      Author: Zachary
      Modified by: H. James de St. Germain  -  Spring 2014

      Important Notes:

        1) this code (is very similar to the loop.php code) just shows the foreach loop in a cleaner manner
        2) notice the creation of a table via code.

-->

<html>
  <head>
    <title>Loop Example 2</title>
  </head>
  
  <body>
    
    <?php 
      $headers = getallheaders();
    ?>
    
    <h2> Building a Table via Code</h2>

    <p>Here are all of the incoming headers:</p>
    
    <table border="1">
      
      <?php 
        foreach ($headers as $name => $value)
        {
          echo "<tr><td>$name</td><td>$value</td></tr>";
        }
      ?>
      
    </table>

    <hr/>

    <h2> Demo of the reference parameter in a for each loop </h2>

    <?php
        // Watch what happens with reference
        foreach ($myarray as $key => &$value)
        {
                echo "$key: $value<br/>";
        	$myarray[2] = "";
        	$myarray[10] = "jim";
        	$value = "hello";
        }

        echo("DONE $myarray[10]</p>");

        <p> The Whole Array </p>

        print_r($myarray);
    ?>

    <hr/>


    
  </body>
</html>