<?php
/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * Helper  functions for the system
 *
*/

// Changes the session ID
function changeSessionID()
{
    // Ask the browser to delete the existing cookie
    setcookie("PHPSESSID", "", time() - 3600, "/");
    // Change the session ID and send it to the browser in a secure cookie
    $server = $_SERVER['SERVER_NAME'];
    $secure = usingHTTPS();
    session_set_cookie_params(0, "/", $server, $secure, true);
    session_regenerate_id(true);
}

function usingHTTPS()
{
    return isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] != "off");
}

function redirectToHTTPS()
{
    if (!usingHTTPS())
    {
        $redirect = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        header("Location:$redirect");
        exit();
    }
}

function verify_role($role)
{
    // Check to see if user is logged in
    if (isset($_SESSION['role']))
    {
        // Check to see if user belongs to role in parameter
        if ($role == $_SESSION['role'])
        {
            return true;
        }
        else if($role == 0 && $_SESSION['role'] == 1)
        {
            return true;
        }
        else
        {
            require_once "../../Controller/User/badRole.php";
            exit();
        }
    }
    require_once "../../Controller/User/badRole.php";
    exit();
}


function verify_Login($role)
{
    // Redirect to use HTTPS
    redirectToHTTPS();

    // Check to see if user is logged in
    if (isset($_SESSION['role']) && isset($_SESSION['login']) && isset($_SESSION['realname'])) {
        // Check to see if user belongs to role in parameter
        if ($role == $_SESSION['role'] || $role =="")
        {
            return true;
        }
        else if($role == "user" && $_SESSION['role'] == "admin")
        {
            return true;

        } else {
            require ('../../View/User/badrole_view.php');
            exit();
        }
    }

    // Empty error message
    $message = '';

    // User is attempting to log in. Need to verify credentials
    if (isset($_REQUEST['username']) && isset($_REQUEST['password']))
    {
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];

        try
        {
            $DBH = openDBConnection();

            // Get information about the user
            $stmt = $DBH->prepare("SELECT name, account_level, password FROM User WHERE username = ?");
            $stmt->bindValue(1, $username);
            $stmt->execute();

            // Was the user real?
            if ($row = $stmt->fetch())
            {

                // Validate the password
                $hashedPassword = $row['password'];
                if (computeHash($password, $hashedPassword) == $hashedPassword)
                {
                    $_SESSION['realname'] = htmlspecialchars($row['name']);
                    $_SESSION['login'] = $username;
                    $rolefromquery = htmlspecialchars($row['account_level']);

                    if ($rolefromquery == 1)
                        $_SESSION['role'] = "admin";
                    else
                        $_SESSION['role'] = "user";

                    $stmt->closeCursor();
                }
                else
                {
                    $message = "Username or password is incorrect.";
                    require ("../../View/Home/index.php");
                    exit();
                }
            }
            else
            {
                $message = "Username or password is incorrect.";
                require ("../../View/Home/index.php");
                exit();
            }
        }
        catch (PDOException $ex)
        {
            error_log("TOBIN THERE WAS AN ERROR LOOKING UP USER : " . $ex->getMessage());
            exit();
        }

        // Logged in so change session ID.
        changeSessionID();
        if ($role == $_SESSION['role'] || $role =="")
        {
            return true;
        }
        else if($role == "user" && $_SESSION['role'] == "admin")
        {
            return true;

        } else {
            require ('../../View/User/badrole_view.php');
            exit();
        }
    }
    else
    {
        require ("../../View/Home/index.php");
        exit();
    }


}

// Generate random salt
function makeSalt()
{
    $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
    return '$2a$12$' . $salt;
}

// Compute a hash
function computeHash($password, $salt)
{
    return crypt($password, $salt);
}

function &getUserInfo () {
    session_start();
    if (!isset($_SESSION['login']) ) {
        error_log("Tobin: session variables not set.");
    }
    return $_SESSION['login'];
}