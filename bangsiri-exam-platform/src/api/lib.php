<?php

require_once __DIR__ . '/dbconfig.php';

function login($username, $password){
    global $db;
    $query = "SELECT `username`, `password` FROM `users` WHERE `username` = ? AND `password` = ?";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, 'ss', $username, $password);
    $exec = mysqli_stmt_execute($stmt);

    if($exec === false){
        die("Query Error");
    }

    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_array($result);
}

function register($num, $name, $username, $password, $time, $is_admin){
    global $db;
    $query = "INSERT INTO `users` (`num`, `name`, `username`, `password`, `regtime`, `is_admin`) VALUE (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, 'isssss', $num, $name, $username, hash('sha512', $password), $time, $is_admin);
    $exec = mysqli_stmt_execute($stmt);

    if($exec === false){
        die("Query Error");
    }

    return $exec;
}

function get_notice(){
    global $db;
    $query = "SELECT * FROM `notice` order by `idx` desc";
    $result = mysqli_query($db, $query);
    return $result;
}

function get_challenge(){
    global $db;
    $query = "SELECT * FROM `challenges` order by `idx` desc";
    $result = mysqli_query($db, $query);
    return $result;
}

function select_challenge($category){
    global $db;
    $query = "SELECT * FROM `challenges` where `ch_category` = ? order by `idx` desc";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, 's', $category);
    $exec = mysqli_stmt_execute($stmt);

    if($exec === false){
        die("Query Error");
    }

    $result = mysqli_stmt_get_result($stmt);

    return $result;
}

function add_notice($title, $time){
    global $db;
    $query = "INSERT INTO `notice` (`title`, `time`) VALUE (?, ?)";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, 'ss', $title, $time);
    $exec = mysqli_stmt_execute($stmt);

    if($exec === false){
        die("Query Error");
    }

    return $exec;
}

function del_notice($idx){
    global $db;
    $query = "DELETE FROM `notice` where `idx` = ?";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, 'i', $idx);
    $exec = mysqli_stmt_execute($stmt);

    if($exec === false){
        die("Query Error");
    }

    return $exec;
}

function add_challenge($name, $content, $category, $link){
    global $db;
    $query = "INSERT INTO `challenges` (`ch_name`, `ch_content`, `ch_category`, `ch_link`) VALUE (?, ?, ?, ?)";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, 'ssss', $name, $content, $category, $link);
    $exec = mysqli_stmt_execute($stmt);

    if($exec === false){
        die("Query Error");
    }

    return $exec;
}

function del_challenge($idx){
    global $db;
    $query = "DELETE FROM `challenges` where `idx` = ?";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, 'i', $idx);
    $exec = mysqli_stmt_execute($stmt);

    if($exec === false){
        die("Query Error");
    }

    return $exec;
}

function get_users(){
    global $db;
    $query = "SELECT * FROM `users` order by `idx` desc";
    $result = mysqli_query($db, $query);
    return $result;
}

function check_status(){
    global $db;
    $query = "SELECT * FROM `env`";
    $result = mysqli_fetch_array(mysqli_query($db, $query));
    return $result;
}

function update_status($status){
    global $db;
    $query = "UPDATE `env` SET `is_start` = ?";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, 's', $status);
    $exec = mysqli_stmt_execute($stmt);

    if($exec === false){
        die("Query Error");
    }

    return $exec;   
}

?>