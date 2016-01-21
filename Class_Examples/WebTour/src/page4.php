<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"> 

<html lang="en"> 
  <head>

    <!-- Last Updated Spring 2016 --> 
    <!-- Original Code: Joe Zachary --> 
    <!-- Updates:       H. James de St. Germain --> 
    <!-- University of Utah --> 

    <!-- This site shows the basics of how to use html, css, javascript, php, etc -->

    <title>Tour of Web Architecture</title>
    
    <meta charset="utf-8"/>
    <meta name="AUTHOR"      content="H. James de St. Germain, Joe Zachary"/>

    <script type="text/javascript" src="../scripts/demo.js"></script>
    <link href="../scripts/demo.css" rel="stylesheet" type="text/css"/>

  </head>

  <body onload="showInfo();">

    <p> It is <?php echo $current ?>  <?php echo "$welcome $favorite" ?></p>

    <p class=heading>
      Here are some planets:
    </p>

    <table>

      <tr>
	<td><input class=arrow type=button value="&lt;" onclick="rotate(-1);"></td>
	<td id="image1"><img src="../images/mars.jpg" height="150" width="150"/></td>
	<td id="image2"><img src="../images/jupiter.jpg" height="150" width="150"/></td>
	<td id="image3"><img src="../images/saturn.gif" height="150" width="150"/></td>
	<td><input class=arrow type=button value="&gt;" onclick="rotate(+1);"></td>
      </tr>

      <tr>
	<td></td>
	<td id="label1"><a href="http://en.wikipedia.org/wiki/Mars">Mars</a></td>
	<td id="label2"><a href="http://en.wikipedia.org/wiki/Jupiter">Jupiter</a></td>
	<td id="label3"><a href="http://en.wikipedia.org/wiki/Saturn">Saturn</a></td>
	<td></td>
      </tr>

    </table>

    <form name="infoForm" method="get" action="">

      <p>
	<label for="firstName">Name:</label> 
	<input type="text" size="30" id="firstName" name="firstName" value="<?php echo $name ?>"/>
      </p>

      <p>
	<select id="planet" name="planet">
	  <option value="">Favorite Planet</option>
	  <option value="Mercury">Mercury</option>
	  <option value="Venus">Venus</option>
	  <option value="Earth">Earth</option>
	  <option value="Mars">Mars</option>
	  <option value="Jupiter">Jupiter</option>
	  <option value="Saturn">Saturn</option>
	  <option value="Uranus">Uranus</option>
	  <option value="Neptune">Neptune</option>
	</select>
      </p>

      <p>
	<input type="submit" value="Submit"/>
      </p>

    </form>

    <p>
      <a href="../">Return to index</a>
    </p>

  </body>
</html>


