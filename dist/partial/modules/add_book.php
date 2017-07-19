<?php

require_once(__DIR__ . '/../../utils/connect.php');
require_once(__DIR__ . '/../../partial/modules/Book.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $photo = '';
    $title = '';
    $author = '';
    $pages = '';
    $type = '';
    $desc = '';
    $errors = [];

    if ( isset($_FILES['photo']['error']) && ($_FILES['photo']['error']) === UPLOAD_ERR_OK) {
        $name = $_FILES['photo']['name'];

        move_uploaded_file(
            $result = $_FILES['photo']['tmp_name'], ''. getcwd() .'/dist/assets/img/' . $name
        );

        if ($result) { echo '<p>Upload OK</p>';}else{ echo '<p>Error</p>';}
        $photo = '/dist/assets/img/' . $name;
    } else {
        $errors['photo'] = 'Something went wrong with uploading the file';
    }
    if (strlen(trim($_POST['title'])) >= 3 && strlen(trim($_POST['title'])) <= 25) {
        $title = $_POST['title'];
    } else {
        $errors['title'] = 'Title must have above 3 and up to 25 characters';
    }
    if (strlen(trim($_POST['author'])) >= 3 && strlen(trim($_POST['author'])) <= 25) {
        $author = $_POST['author'];
    } else {
        $errors['author'] = 'Author name must have above 3 and up to 25 characters';
    }
    if (is_numeric($_POST['pages'])) {
        $pages = $_POST['pages'];
    } else {
        $errors['pages'] = 'Add pages number as number.';
    }
    if (isset($_POST['type'])) {
        $type = $_POST['type'];
    } else {
        $errors['type'] = 'Select type of book.';
    }
    if (strlen(trim($_POST['desc'])) >= 3 && strlen(trim($_POST['desc'])) <= 255) {
        $desc = $_POST['desc'];
    } else {
        $errors['desc'] = 'Description must have above 3 and up to 255 characters';
    }

    if ($errors) {
        echo json_encode($errors, JSON_FORCE_OBJECT);
    } else {
        $book = new Book();

        $book->setTitle($title);
        $book->setAuthor($author);
        $book->setPages($pages);
        $book->setType($type);
        $book->setDesc($desc);
        $book->setImgPath($photo);

//        $book->setImgPath();

        var_dump($book);

        $createBook = $book->createBook($conn);
        var_dump($createBook);

        if ($createBook === True) {
            header('Location: /Workshops/books/dist/index.php?index');
        } else {
            echo 'Something went wrong';
        }

        $conn->close();
        $conn = null;
    }

} else {
    echo 'This is not POST request method.';
}