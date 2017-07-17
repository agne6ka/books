<?php

require_once(__DIR__ . '/../../utils/connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $photo = '';
    $title = '';
    $author = '';
    $page = '';
    $type = '';
    $desc = '';
    $errors = [];

    if (strlen(trim($_POST['title'])) >= 3 && strlen(trim($_POST['title'])) <= 25) {
        $title = $_POST['title'];
    } else {
        $errors['title'] = 'Title must have above 3 and up to 25 characters';
    }
    if (strlen(trim($_POST['author'])) >= 3 && strlen(trim($_POST['author'])) <= 25) {
        $author = $_POST['author'];
    } else {
        $errors['author'] ='Author name must have above 3 and up to 25 characters';
    }
    if (is_numeric($_POST['page'])) {
        $page = $_POST['page'];
    } else {
        $errors['page'] ='Add page number as number.';
    }
    if (isset($_POST['type'])) {
        $type = $_POST['type'];
    } else {
        $errors['type'] ='Select type of book.';
    }
    if (strlen(trim($_POST['desc'])) >= 3 && strlen(trim($_POST['desc'])) <= 255) {
        $desc = $_POST['desc'];
    } else {
        $errors['desc'] ='Description must have above 3 and up to 255 characters';
    }

    if ($errors) {
        echo json_encode($errors, JSON_FORCE_OBJECT);
    } else {
        echo json_encode($_POST);
    }

} else {
    echo 'This is not POST request method.';
}