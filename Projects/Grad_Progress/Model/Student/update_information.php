<?php
/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * Model to allow the DGS to change the role of a user.
 *
 */

require '../../Model/Functions/db.php';

require '../../Model/Functions/authentication.php';

verify_Login('student');

/*if (isset($_POST['submit']))
{
    $username = trim($_REQUEST['user']);
    $role = trim($_REQUEST['role']);

    // Create a DB connection
    $db = openDBConnection();
    $db->beginTransaction();

    // Update the roll
    $stmt = $db->prepare("UPDATE Roles SET role = ? WHERE username = ?; ");
    $stmt->bindValue(1, $role);
    $stmt->bindValue(2, $username);
    $stmt->execute();

    $db->commit();
}*/

class Update_Info
{
    public $uid;
    public $name;
    public $position;
    public $username;
    public $degree;
    public $track;
    public $semester_admitted;


    // Constructor
    public function __construct()
    {
        $this->user_info();
    }

    // Method for creating student form
    function user_info()
    {
        try {
            $this->uid = $_SESSION['userid'];
            $this->name = $_SESSION['realname'];
            $this->username = $_SESSION['login'];

            //error_log("TOBIN!!!! UID is : " . $this->uid);
            //error_log("TOBIN!!!! Name is : " . $_SESSION['realname']);
            //error_log("TOBIN!!!! Username is : " . $_SESSION['login']);

            $db = openDBConnection();

            // Query the database to find out which advisor is related to this student.
            $query = "SELECT Users.position,Students.degree, Students.track, Students.semester_admitted FROM Users INNER JOIN Students ON Users.uid = Students.uid AND Users.uid = ?; ";
            $statement = $db->prepare($query);
            $statement->bindValue(1, $this->uid);
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            //$this->username = array();
            foreach ($result as $row) {
                //$this->name = $row['name'];
                $this->position = $row['position'];
                //$this->username = $row['username'];
                $this->degree = $row['degree'];
                $this->track = $row['track'];
                $this->semester_admitted = $row['semester_admitted'];
            }
        }
        catch (PDOException $ex) {
        }
    }
}
