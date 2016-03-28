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

class User_Roles
{
    public $username;

    // Constructor
    public function __construct()
    {
        $this->create_roles();
    }

    // Method for creating student form
    function create_roles()
    {
        try {
            $db = openDBConnection();

            // Query the database to find out which advisor is related to this student.
            $query = "SELECT username, role FROM Roles";
            $statement = $db->prepare($query);
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            $this->username = array();
            foreach ($result as $row) {
                $this->username[] = array(htmlspecialchars($row['username']), htmlspecialchars($row['role']));
            }
        }
        catch (PDOException $ex) {
        }
    }
}
