<?php
/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * Progress Forms Model -- Represents a form object populated with student information
 *
 */

// If submission, process the submission
$nameError = '';
$loginError = '';
$passwordError = '';

if (isset($_REQUEST['name']) && isset($_REQUEST['uid']) && isset($_REQUEST['username']) && isset($_REQUEST['password']) && isset($_REQUEST['account_type'])) {
    $name = trim($_REQUEST['name']);
    $uid = trim($_REQUEST['uid']);
    $username = trim($_REQUEST['username']);
    $password = trim($_REQUEST['password']);
    $position = trim($_REQUEST['account_type']);

    // If all information for creating an account is provided, create the user account.
    if ($username != '' && $password != '') {
        //$account_type = isset($_REQUEST['account_type']);

        try {
            $db = new PDO("mysql:host=localhost;dbname=Grad_Prog_V4;charset=utf8", 'Grad_Application', '173620901');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            $db->beginTransaction();

            $stmt = $db->prepare("INSERT INTO Users (uid, name, position, username, password) VALUES (?, ?, ?, ?, ?)");
            $stmt->bindValue(1, $uid);
            $stmt->bindValue(2, $name);
            $stmt->bindValue(3, $position);
            $stmt->bindValue(4, $username);
            $stmt->bindValue(5, $password);

            error_log("Tobin is logging: made it here");

            $stmt->execute();
            $db->commit();
        } catch (PDOException $ex) {
            error_log("Tobin is logging:   " . $ex->getMessage());
        }
    }

    // Perform simple validations
    if ($name == '') {
        $nameError = 'Enter your full name';
    }

    if ($password == '') {
        $passwordError = 'Enter a valid password';
    }

    if ($username == '') {
        $loginError = 'Pick a valid username';
    }

     require '../../View/UserCreation/creation_form_view.php';
}
else
{
    require '../../View/UserCreation/creation_form_view.php';
}