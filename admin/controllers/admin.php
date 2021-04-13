<?php
/*session_start();*/
/*/admin/controllers/admin.php

In admin.php subcontroller: 5 action cases
action = logout
empty session array
destroy session
provide $login_message to display
include /view/login.php
action = show_register
include /view/register.php
action = show_login
include /view/login.php
action = login
call is_valid_login function (pg 703)
if function returns true, set is_valid_admin session variable (pg 707)
also redirect to controller with "list_vehicles" action
if false, provide $login_message (pg 707)
also include /view/login.php
action = register
include /util/valid_register.php
call valid_registration function
if $errors array contains errors, include /view/register.php
else call add_admin function (pg 703)
and set is_valid_admin session variable
and redirect to controller with "list_vehicles" action
*/
//if(!isset($_SESSION['is_valid_admin']))
//    $action

switch ($action){
    case 'logout':
        break;
    case 'show_register':
        include 'view/register.php';
        break;
    case 'show_login':
        include 'view/login.php';
        break;
    case 'login':

        if(!empty($username) && !empty($password) && (is_valid_admin_login($username, $password)))
        {
            $_SESSION['is_valid_admin'] = true;
                include('view/vehicle_list.php');
        }
        else {
            $login_message = "Incorrect Login / Login Required.";
            include 'view/login.php';
        }
        break;
    case 'logout':
        $_SESSION = array();//Clear all session data from memory
        session_destroy(); //Clean up the session ID
        $login_message = "You have been logged out.";
        include('view/login.php');
        break;
    case 'register':
        include ('util/valid_register.php');
        if(valid_registration($username,$password,$confirm_password))
            echo "valid";
        else
            include 'view/register.php';
        break;

}
?>