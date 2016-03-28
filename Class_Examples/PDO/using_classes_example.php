<?php


  /**
   * Author: H. James de St. Germain
   * Date: Spring 2015
   *
   *  Sample PDO code for reading into an object
   *
   */



class Student
{
  public $First_Name;
  public $Last_Name;
  public $ID;

}
    

require 'db_config_actual.php';         // contains db connection variables
                                 // separated for security and abstraction purposes

try
{
  //
  // The main content of the page will be in this variable
  //
  $output = "";
  
  //
  // Connect to the data base and select it.
  //
  $db = new PDO("mysql:host=$server_name;dbname=$db_name;charset=utf8", $db_user_name, $db_password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

  //
  // Build the basic query
  //
  $query =     "
       SELECT * FROM Users 
   ";  //  WHERE ID=12345678

  //
  // Prepare and execute the query
  //

  $statement = $db->prepare( $query );
  $statement->setFetchMode(PDO::FETCH_CLASS, 'Student');
  $statement->execute(  );

  //
  // Fetch the result
  //
  $users    = $statement->fetchAll();

}
catch (PDOException $ex)
{
  echo
     "<p>oops</p>
      <p> Code: {$ex->getCode()} </p>
      <pre>$ex</pre>";

}

echo "<hr/> <p>Users:</p> ";

if (isset($users))
  {
    foreach ($users as $user)
      {
	echo "<p>{$user->First_Name} {$user->Last_Name}</p>";
      }
  }
