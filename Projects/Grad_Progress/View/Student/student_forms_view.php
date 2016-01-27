<?php
/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * Student Forms View
 *
 */

echo "
 <!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\" \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">

      <html lang=\"en\">
        <head>

          <!-- Last Updated Spring 2016 -->
          <!-- Brandon Tobin -->
          <!-- University of Utah -->

          <!-- This is a list page of forms for Anne  -->


          <title>$student->student_First_Name's Forms</title>

          <!-- Meta Information about Page -->
          <meta charset=\"utf-8\"/>
          <meta name=\"AUTHOR\"      content=\"Brndon Tobin\"/>
          <meta name=\"keywords\"    content=\"HTML, Projects\"/>
          <meta name=\"description\" content=\"Anne's page of forms\"/>

          <!-- ALL CSS FILES -->
           <link rel=\"stylesheet\" href=\"../../Resources/css/stylesheet.css\" type=\"text/css\"/>

        </head>

        <body>

	 <!-- Header -->
         <div id=\"header\">
          <img src=\"/Resources/Images/uofufootball.jpg\" alt=\"Rice Eccles Stadium\" />
          <h1>University of Utah - CS 4540</h1>
          <h2>Web Software Architecture - Spring 2016</h2>
          <h2>Brandon Tobin</h2>
	  <h2>Grad Progress - Assignment 1</h2>
         </div>

	 <!-- Navigation Bar -->
	 <ul id=\"navigation\">
          <li><a href=\"../../index.html\">Home</a></li>
          <li><a href=\"../../Projects/\">Projects</a></li>
          <li><a href=\"../../Class_Examples/\">Examples</a></li>
	  <li><a href=\"student_list.html\">Back</a></li>
	 </ul>

         <h1>Anne's Forms</h1>

     	 <!-- Table containing $student->student_First_Name's forms -->
         <table class=\"roster\">
	  <tr>
	   <th>Date Created:</th>
	   <th>Date Last Modified:</th>
	   <th>Compliance:</th>
	   <th>Form:</th>
	  </tr>
	  ";

     for ($i = 0; $i < $student->form_count; $i++)
     {
       echo "
       <tr>
	   <td>".var_dump($student->form_Records_Array[0])."</td>
	   <td>".var_dump($student->form_Records_Array[1])."</td>
	   <td>".var_dump($student->form_Records_Array[2])."</td>
	   <td><a href=\"".var_dump($student->form_Records_Array[3])."\">Link</a></td>
 	  </tr>";
     }

     echo "
	 </table>

        </body>

      </html>

";




