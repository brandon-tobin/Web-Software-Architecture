<?php

/**
 * Created by PhpStorm.
 * User: Fumiko
 * Date: 5/1/2016
 * Time: 5:49 PM
 */

require '../../Model/Functions/db.php';
require '../../Model/Functions/authentication.php';
getUserInfo();

if(verify_Login("user"))
{
    require_once ("../../View/User/home_view.php");
}
else
{
    require_once ("../../View/Home/index.php");
}

class home
{

}