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

verify_Login('dgs');

if (isset($_POST['submit']))
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
}

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
            $uid = $_SESSION['userid'];

            error_log("TOBIN!!!! UID is : " . $uid);

            $db = openDBConnection();

            // Query the database to find out which advisor is related to this student.
            $query = "SELECT Users.uid, Users.name, Users.position, Users.username, Students.degree, Students.track, Students.semester_admitted FROM Users INNER JOIN Students ON Users.uid = Students.uid AND Users.uid = ?; ";
            $statement = $db->prepare($query);
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            $this->username = array();
            foreach ($result as $row) {
                $this->username[] = array($row['username'], $row['role']);
            }
        }
        catch (PDOException $ex) {
        }
    }
}
