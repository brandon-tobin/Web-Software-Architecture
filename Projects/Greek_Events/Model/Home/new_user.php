<?php

/**
 * Created by PhpStorm.
 * User: Fumiko
 * Date: 4/30/2016
 * Time: 11:31 PM
 */

require '../../Model/Functions/db.php';
require '../../Model/Functions/authentication.php';


if (isset($_POST['submit'])) {

    try {
        $username = trim($_REQUEST['username']);
        $password = trim($_REQUEST['password']);
        $cpassword = trim($_REQUEST['cpassword']);
        $name = trim($_REQUEST['name']);
        $organization = trim($_REQUEST['organization']);
        $orgID;

        $db = openDBConnection();
        $db->beginTransaction();
        $query = "Select orgID from Organizations where name = '?'";
        $stmt = $db->prepare($query);
        $stmt->bindValue(1, $organization);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $row) {
            $this->orgID = htmlspecialchars($row['orgID']);
        }

        error_log("ANNE: orgID is {$orgID}");

        $db->beginTransaction();
        $stmt = $db->prepare("INSERT INTO User (username, password, name, orgID) values (?, ?, ?, ?)");
        $stmt->bindValue(1, $username);
        $stmt->bindValue(2, $password);
        $stmt->bindValue(3, $name);
        $stmt->bindValue(4, $orgID);
        $stmt->execute();
        $db->commit();

        $_SESSION['realname'] = htmlspecialchars($row['name']);
        $_SESSION['login'] = $username;
        $_SESSION['roles'] = htmlspecialchars($row['account_level']);
    }
    catch (PDOException $ex)
    {
        error_log("ANNE: error creating user : " . $ex->getMessage());
        exit();
    }

    require_once "../../Controller/User/success.php";
}
else
{
    require_once "../../View/Home/new_user_creation_view.php";
}
class NewUser
{

}