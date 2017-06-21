<?php

require_once( __DIR__ . '/../../utils/connect.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $photo = '';
    $title = '';
    $author = '';
    $page = '';
    $type = '';
    $desc = '';
    $error = [];

    if($_POST['photo']){

    } else {
        $error[] = 'Add img file';
    }
    if(strlen(trim($_POST['title'])) >= 3 && strlen(trim($_POST['title'])) <= 25){
        $title = $_POST['title'];
    }else{
        $error[] = 'Title must have above 3 and up to 25 characters';
    }
    if(strlen(trim($_POST['author'])) >= 3 && strlen(trim($_POST['author'])) <= 25){
        $author = $_POST['author'];
    }else{
        $error[] = 'Author name must have above 3 and up to 25 characters';
    }
    if(is_int($_POST['page'])){
        $page = $_POST['page'];
    }else{
        $error[] = 'Add page number as number.';
    }
    if(isset($_POST['type'])){
        $type = $_POST['type'];
    }else{
        $error[] = 'Select type of book.';
    }
    if(strlen(trim($_POST['desc'])) >= 3 && strlen(trim($_POST['desc'])) <= 255){
        $desc = $_POST['desc'];
    }else{
        $error[] = 'Description must have above 3 and up to 255 characters';
    }

    $data = json_encode($_POST);
    $err = json_encode($error);
    echo $data;
}else{
    echo 'This is not POST request method.';
}