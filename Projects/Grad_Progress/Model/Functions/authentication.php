<?php
/**
 * Created by PhpStorm.
 * User: Tobin
 * Date: 2/23/2016
 * Time: 3:52 PM
 */

// Changes the session ID
function changeSessionID()
{
    // Ask browser to delete existing cookie
    setcookie("PHPSESSID", "", time()-3600, "/");

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
    if (isset($_SESSION['userid']))
    {
        // Check to see if user belongs to role in parameter
        if ($role == '' || (isset($_SESSION['roles']) && in_array($role, $_SESSION['roles'])))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    return false;
}

function verify_Login($role)
{
    // Redirect to use HTTPS
    redirectToHTTPS();

    // Check to see if user is logged in
    if (isset($_SESSION['userid']))
    {
        // Check to see if user belongs to role in parameter
        if ($role == '' || (isset($_SESSION['roles']) && in_array($role, $_SESSION['roles'])))
        {
            error_log("TOBIN User is logged in and Role is correct!!!!");
            return true;
        }
        else{
            error_log("TOBIN User is logged but the Role is incorrect!!!!");
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
            $stmt = $DBH->prepare("SELECT uid, name, position, password FROM Users WHERE username = ?");
            $stmt->bindValue(1, $username);
            $stmt->execute();

            // Was the user real?
            if ($row = $stmt->fetch())
            {
                // Validate the password
                $hashedPassword = $row['password'];
                if (computeHash($password, $hashedPassword) == $hashedPassword)
                {
                    $_SESSION['userid'] = $row['uid'];
                    $_SESSION['realname'] = htmlspecialchars($row['name']);
                    $_SESSION['login'] = $username;
                    $stmt->closeCursor();
                    $stmt = $DBH->prepare("SELECT role FROM Roles WHERE username = ?");
                    $stmt->bindValue(1, $username);
                    $stmt->execute();
                    $roles = array();
                    while ($row = $stmt->fetch())
                    {
                        $roles[] = $row['role'];
                    }
                    $_SESSION['roles'] = $roles;
                }
                else
                {
                    $message = "Username or password is incorrect.";
                    // require view for login
                    exit();
                }
            }
            else
            {
                $message = "Username or password is incorrect.";
                // require view for login
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
        if ($role == '' || in_array($role, $_SESSION['roles']))
        {
            return;
        }
        else
        {
            error_log("TOBIN User is logged but the Role is incorrect!!!!");
            exit();
        }
    }
    else
    {
        error_log("TOBIN User is logged but the Role is incorrect!!!!");
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