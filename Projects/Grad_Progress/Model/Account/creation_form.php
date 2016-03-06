<?php
/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * User Creation Model -- Represents a form for creating new users
 *
 */

require '../../Model/Functions/db.php';

require '../../Model/Functions/authentication.php';


// Use HTTPS
redirectToHTTPS();

// If submission, process the submission
$nameError = '';
$loginError = '';
$passwordError = '';
$confirmedPasswordError = '';
$uidError = '';

if (isset($_REQUEST['submit']) && $_REQUEST['submit'] == 'Cancel')
{
    header("Location: ../home.php");
}
if (isset($_REQUEST['name']) && isset($_REQUEST['uid']) && isset($_REQUEST['username']) && isset($_REQUEST['password']) && isset($_REQUEST['confirmedPassword'])) {

    $name = trim($_REQUEST['name']);
    $uid = trim($_REQUEST['uid']);
    $username = trim($_REQUEST['username']);
    $password = trim($_REQUEST['password']);
    $confirmedPassword = trim($_REQUEST['confirmedPassword']);

    // Perform simple validations
    if ($name == '') {
        $nameError = 'Enter your full name';
    }

    if ($password == '') {
        $passwordError = 'Enter a valid password';
    }

    if (!(preg_match('/\d{8}/', $uid))) {
        $passwordError = 'Password must be at least 8 characters long';
    }

    if (strcmp($password, $confirmedPassword) != 0) {
        $confirmedPasswordError = 'Passwords do not match';
    }

    if ($username == '') {
        $loginError = 'Pick a valid username';
    }

    if (!(preg_match('/\d{7}/', $uid))) {
        $uidError = 'Invalid uID';
    }

    // If all information for creating an account is provided, create the user account.
    if ($nameError == '' && $passwordError == '' && $confirmedPasswordError == '' && $loginError == '' && $uidError == '')
    {
        try {
            $db = openDBConnection();

            $db->beginTransaction();

            $stmt = $db->prepare("INSERT INTO Users (uid, name, username, password) VALUES (?, ?, ?, ?)");
            $stmt->bindValue(1, $uid);
            $stmt->bindValue(2, $name);
            //$stmt->bindValue(3, $position);
            $stmt->bindValue(3, $username);
            $hashedPassword = computeHash($password, makeSalt());
            $stmt->bindValue(4, $hashedPassword);
            $stmt->execute();

            $stmt = $db->prepare("INSERT INTO Roles (username, role) VALUES (?,?)");
            $stmt->bindValue(1, $username);
            $stmt->bindValue(2, "user");
            $stmt->execute();

            $db->commit();

           // require '../../View/Account/account_home.php';
        } catch (PDOException $ex) {
            error_log('Tobin message: ' . $ex->getMessage());
            require '../../View/Account/creation_fail_view.php';
        }
    }
    else
    {
       // require '../../View/Account/creation_form_view.php';
        require '../../View/Account/account_home.php';
    }
}
else
{
    //require '../../View/Account/creation_form_view.php';
    require '../../View/Account/account_home.php';
}