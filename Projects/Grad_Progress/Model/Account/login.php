<?php
/**
 * Created by PhpStorm.
 * User: brand
 * Date: 2/23/2016
 * Time: 9:19 PM
 */

require ('../../Model/Functions/db.php');

require ('../../Model/Functions/authentication.php');


redirectToHTTPS();

if (verify_role(''))
{
    require ('../../View/Account/account_home.php');
}
else
{
    verify_Login('');
}
