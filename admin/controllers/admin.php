<?php
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
        include 'view/login.php';
        break;

}
?>