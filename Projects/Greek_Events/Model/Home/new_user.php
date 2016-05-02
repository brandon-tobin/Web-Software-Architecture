<?php
/**
 * User: Fumiko Aoki
 * Date: Spring 2016
 *
 * New Account Creation Model
 *
 */

require '../../Model/Functions/db.php';
require '../../Model/Functions/authentication.php';

getUserInfo();

if (isset($_POST['submit'])) {

    $username = trim($_REQUEST['username']);
    $password = trim($_REQUEST['password']);
    $cpassword = trim($_REQUEST['cpassword']);
    $name = trim($_REQUEST['name']);
    $organization = trim($_REQUEST['organization']);

    $error = false;

    // Complain if name is missing
    if ($name == '') {
        $nameError = 'Enter your name.';
        $error = true;
    }

    // Complain if password is missing
    if ($password == '') {
        $passwordError = 'Pick a password.';
        $error = true;
    }

    // Complain if login is missing
    if ($username == '') {
        $usernameError = 'Enter a username.';
        $error = true;
    }

    if ($password != $cpassword)
    {
        $cpasswordError = "Password fields do not match.";
        $error = true;
    }

    if($error)
    {
        require_once ("../../View/Home/new_user_creation_view.php");
    }
    else {

        $salt = makeSalt();
        $hashedPassword = computeHash($password, $salt);

        try {

            $db = openDBConnection();
            $query = "Select orgID from Organizations where name = '{$organization}'";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                $orgID = htmlspecialchars($row['orgID']);
            }

            $db->beginTransaction();
            $stmt = $db->prepare("INSERT INTO User (username, password, name, orgID, account_level) values (?, ?, ?, ?, ?)");
            $stmt->bindValue(1, $username);
            $stmt->bindValue(2, $hashedPassword);
            $stmt->bindValue(3, $name);
            $stmt->bindValue(4, $orgID);
            $stmt->bindValue(5, 0);
            $stmt->execute();
            $db->commit();

            $_SESSION['realname'] = $name;
            $_SESSION['login'] = $username;
            $_SESSION['role'] = "user";

        } catch (PDOException $ex) {
            error_log("ANNE: error creating user : " . $ex->getMessage());
            exit();
        }

        includeInEvents($orgID);
        require_once "../../Controller/User/success.php";
    }
}
else
{
    require_once "../../View/Home/new_user_creation_view.php";
}

/*
 * This method places entries into the EventPermission table for the user
 * so the user will be able to join an event even though the event was
 * created before the user.
 */
function includeInEvents($orgID)
{
    try {
        $db = openDBConnection();
        $query = "SELECT eventID FROM EventPermission where orgID = {$orgID}";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $events = array();
        $rowcount = 0;
        $insertcount = 0;

        foreach ($result as $row) {
            array_push($events, htmlspecialchars($row['eventID']));
            $rowcount++;
        }

        $db->beginTransaction();

        for ($i = 0; $i < count($events); $i++)
        {
            $stmt = $db->prepare("INSERT INTO Attending VALUES (?, ?, ?)");

            $stmt->bindValue(1, $_SESSION['login']);
            $stmt->bindValue(2, $events[$i]);
            $stmt->bindValue(3, 0);
            $stmt->execute();
            $insertcount++;
        }

        $db->commit();
    }
    catch (PDOException $ex)
    {
        error_log("ANNE: adding new user to events: " . $ex->getMessage());
        exit();
    }
}