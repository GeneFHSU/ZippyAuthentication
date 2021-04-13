<?php

//page 703
function add_admin ($username, $password){
    global $db;
    $hash = password_hash($password,PASSWORD_DEFAULT);
    $query = 'INSERT INTO administrators (username, password)
            VALUES (:email,:password)';
    $statement = $db->prepare($query);
    $statement->bindValue(':email',$username);
    $statement->bindValue(':password',$hash);
    $statement->execute();
    $statement->closeCursor();
}

//page 703
function is_valid_admin_login($username, $password){
    global $db;
    $hash = password_hash($password,PASSWORD_DEFAULT);
    $query = 'SELECT password from administrators
                WHERE username = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username',$username);
    $statement->execute();
    $row = $statement->fetch();
    $statement->closeCursor();

    /*The 2nd change: In the 2nd to last line of code ( $hash = $row['password']; ) we have to check if that is a null
    value. Older versions of PHP did not mind what your textbook has, but the newer version we are working with does not
    like this if $row['password'] does not exist. */
    if(empty($row['password']))
        return false;
    $hash = $row['password'];
    return password_verify($password,$hash);
}

function username_exists($username){
    global $db;
    $query = 'SELECT COUNT(*)
               FROM administrators
                WHERE username = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username',$username);
}