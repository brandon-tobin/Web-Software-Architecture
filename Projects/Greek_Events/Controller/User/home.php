<?php
/**
 * Created by PhpStorm.
 * User: Fumiko
 * Date: 5/1/2016
 * Time: 3:23 AM
 */


if (isset($_SESSION['realname']) && isset($_SESSION['login']) && isset($_SESSION['role'])) {
    require_once ("../../View/User/home_view.php");
}
else
{
    require_once ("../Home/index.php");
}