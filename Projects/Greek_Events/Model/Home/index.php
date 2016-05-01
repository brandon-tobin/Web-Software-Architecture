<?php
/**
 * Created by PhpStorm.
 * User: Fumiko
 * Date: 4/29/2016
 * Time: 3:33 PM
 */

require '../../Model/Functions/db.php';
require '../../Model/Functions/authentication.php';

if(isset($_POST['submit']))
{
    if (verify_Login())
    {
        require_once "../../Controller/User/success.php";
    }
}
else
{
    require_once "../../View/index";
}