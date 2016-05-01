<?php

/**
 * Created by PhpStorm.
 * User: Fumiko
 * Date: 4/30/2016
 * Time: 11:31 PM
 */

require '../../Model/Functions/db.php';
require '../../Model/Functions/authentication.php';

verify_Login("");

if (isset($_POST['submit'])) {
    $username = trim($_REQUEST['username']);
    $password = trim($_REQUEST['password']);
    $cpassword = trim($_REQUEST['cpassoword']);
    $name = trim($_REQUEST['name']);
    $organization = trim($_REQUEST['organization']);
    $orgID;

    $db = openDBConnection();
    $query = "Select orgID from Organizations where name = ?";
    $stmt = $db->prepare($query);
    $stmt->bindValue(1, $organization);
    $stmt->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $row) {
        $this->orgID = htmlspecialchars($row['orgID']);
    }

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

class NewUser
{

}