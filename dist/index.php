<?php
require_once('utils/connect.php');
include_once('partial/components/_header.php');
include_once('partial/components/_nav_component.php');

$url = $_SERVER['REQUEST_URI'];
$explode = explode('?', $url);

if($explode[1] === 'add-book'){
    include_once('partial/content/_book_form.php');
}elseif($explode[1] === 'index'){
    include_once('partial/content/_book_list.php');
}
include_once('partial/components/_footer.php');