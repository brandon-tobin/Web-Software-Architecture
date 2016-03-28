
<?php


/**
 * Author: H. james de St. Germain
 * Date: Spring 2016
 *
 * Simple example of MVC - Here is a class file representing data to be
 * used by the Controller/View to create a form.
 *
 */


class Form
{
  public $name, $year, $complete;


  public function __construct( $id )
  {
    $this->name = "undefined";

    if ($id == 1)  {    $this->name     = 'Jim';      }
    if ($id == 2)  {    $this->name     = 'Dav';      }
    if ($id == 3)  {    $this->name     = 'Joe';      }
    if ($id == 4)  {    $this->name     = 'Erin';     }
    
    
    $this->year     = 2005 + $id;
    $complete = rand(0,1);  // "this" is wrong to get the point across

  }


}