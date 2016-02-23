<?php
/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * User Creation Model -- Represents a form for creating new users
 *
 */

require '../../Model/db.php';

// If submission, process the submission
$nameError = '';
$loginError = '';
$passwordError = '';
$confirmedPasswordError = '';
$uidError = '';

//if (isset($_REQUEST['name']) && isset($_REQUEST['uid']) && isset($_REQUEST['username']) && isset($_REQUEST['password']) && isset($_REQUEST['account_type'])
//    && isset($_REQUEST['confirmedPassword'])) {
if (isset($_REQUEST['name']) && isset($_REQUEST['uid']) && isset($_REQUEST['username']) && isset($_REQUEST['password']) && isset($_REQUEST['confirmedPassword'])) {

    $name = trim($_REQUEST['name']);
    $uid = trim($_REQUEST['uid']);
    $username = trim($_REQUEST['username']);
    $password = trim($_REQUEST['password']);
    $confirmedPassword = trim($_REQUEST['confirmedPassword']);
    //$position = trim($_REQUEST['account_type']);
    //$degree = trim($_REQUEST['degree']);
    //$track = trim($_REQUEST['track_type']);
    //$date = trim($_REQUEST['date']);

    // Perform simple validations
    if ($name == '') {
        $nameError = 'Enter your full name';
    }

    if ($password == '') {
        $passwordError = 'Enter a valid password';
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
            $stmt->bindValue(4, $password);

            $stmt->execute();
            $db->commit();

            /*if ($position == 'S')
            {
                $db->beginTransaction();
                $stmt = $db->prepare("INSERT INTO Students (uid, degree, track, semester_admitted) VALUES (?, ?, ?, \"?\")");
                $stmt->bindValue(1, $uid);
                $stmt->bindValue(2, $degree);
                $stmt->bindValue(3, $track);
                $stmt->bindValue(4, $date);
                $stmt->execute();
                $db->commit();
            }*/

            require '../../View/Student/account_home_view.php';
        } catch (PDOException $ex) {
            error_log('Tobin message: ' . $ex->getMessage());
            require '../../View/UserCreation/creation_fail_view.php';
        }
    }
    else
    {
        require '../../View/UserCreation/creation_form_view.php';
    }
}
else
{
    require '../../View/UserCreation/creation_form_view.php';
}