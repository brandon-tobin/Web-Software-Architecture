<?php
/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * Account Home Page Model
 *
 */

require '../../Model/Functions/db.php';

require ('../../Model/Functions/authentication.php');

$role = get_role();

verify_Login($role);

require ('../../View/Account/account_home.php');