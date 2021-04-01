<?php
    //local development server connection
    //$dsn = 'mysql:host=localhost;dbname=zippyusedautos';
    //$username = 'root';
    //$password = 'pa55word';

    // Heroku connection
    /* 
    $dsn = 'mysql:host=AVeryLongURLprovidedforJawsDBhost;dbname=YourJawsDBdbname';
    $username = 'Your JawsDB username';
    $password = 'Your JawsDB password'; */

    //Heroku connection
    $url = getenv('JAWSDB_URL');
    $dbparts = parse_url($url);

    $hostname = $dbparts['host'];
    $username = $dbparts['user'];
    $password = $dbparts['pass'];
    $database = ltrim($dbparts['path'],'/');

    $db = null;

    try {
        //local development server connection
        //if using a $password, add it as 3rd parameter
        //$db = new PDO($dsn, $username);


        // Heroku connection
        //$db = new PDO($dsn, $username, $password);

        $db = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
        // set the PDO error mode to exception
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        $error = "Database Error: ";
        $error .= $e->getMessage();
        include('../view/error.php');
        exit();
    }
?>