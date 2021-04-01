<?php
    //2) Therefore, at the top of your index.php controller for Zippy's public facing site, begin your session
    // as you see in the first lines of the textbook on pg. 369.
    //Start session management with a persistent cookie
    $lifetime = 60 * 60 * 24 * 14; // 2 weeks in seconds
    session_set_cookie_params($lifetime,'/');
    session_start();

    // Model
    require('model/database.php');
    require('model/vehicle_db.php');
    require('model/type_db.php');
    require('model/class_db.php');
    require('model/make_db.php');

    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    switch($action) {
        case 'register':
            $firstname = filter_input(INPUT_GET, 'firstname', FILTER_SANITIZE_STRING);
            if (!empty($firstname)) {
                $_SESSION['userid'] = $firstname;
            }
            include('view/register.php');
            break;
        case 'logout':
            $firstname = null;
            if(isset($_SESSION['userid']))
            {
                //get firstname before deleting it
                $firstname = $_SESSION['userid'];

                //unset session
                unset($_SESSION['userid']);

                //End session
                $_SESSION = array();
                session_destroy();

                //Delete cookie
                $name = session_name();
                $expire = strtotime('-1 year');
                $params = session_get_cookie_params();
                $path = $params['path'];
                $domain = $params['domain'];
                $secure = $params['secure'];
                $httponly = $params['httponly'];
                setcookie($name, '', $expire, $path, $domain, $secure, $httponly);
            }
            include('view/logout.php');
            break;
        default:
            // Get required data from Model
            $types = get_types();
            $classes = get_classes();
            $makes = get_makes();

            // Get Parameter data sent to Controller
            $make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
            $type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
            $class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
            $sort = filter_input(INPUT_GET, 'sort', FILTER_SANITIZE_STRING);
            if (!$sort) $sort = 'price';

            // Get Data for View
            /* if ($make_id) {
                $make_name = get_make_name($make_id);
                $vehicles = get_vehicles_by_make($make_id, $sort);
            } else if ($type_id) {
                $type_name = get_type_name($type_id);
                $vehicles = get_vehicles_by_type($type_id, $sort);
            } else if ($class_id) {
                $class_name = get_class_name($class_id);
                $vehicles = get_vehicles_by_class($class_id, $sort);
            } else {
                $vehicles = get_all_vehicles($sort);
            } */

            // Extra credit solution
            $vehicles = get_all_vehicles($sort);
            if ($make_id) {
                $make_name = get_make_name($make_id);
                $vehicles = array_filter($vehicles, function($array) use ($make_name) {
                    return $array["Make"] === $make_name;
                });
            }
            if ($type_id) {
                $type_name = get_type_name($type_id);
                $vehicles = array_filter($vehicles, function($array) use ($type_name) {
                    return $array["Type"] === $type_name;
                });
            }
            if ($class_id) {
                $class_name = get_class_name($class_id);
                $vehicles = array_filter($vehicles, function($array) use ($class_name) {
                    return $array["Class"] === $class_name;
                });
            }

            include('view/vehicle_list.php');
    }


    //Create a

    //6) Look for a new GET variable "firstname" in the controller. You will be routing back to the register action
    //again, but you will have a firstname variable value!
    //$firstname = filter_input(INPUT_GET, 'firstname', FILTER_SANITIZE_STRING);

    //7) Before your switch statement in the controller, add an if statement to see if you have a value in the
    //$firstname variable (otherwise it should be false).
    //if($firstname)


        
    


   