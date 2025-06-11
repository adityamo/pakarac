<?php
$page = (isset($_GET['page'])) ? $_GET['page'] : '';

switch ($page) {
    case 'home':
        include "pages/home.php";
        break;

    case 'contact-us':
        include "pages/contact-us.php";
        break;

    case 'news';
        include 'pages/news.php';
        break;

    case 'organisasi';
        include 'pages/organisasi.php';
        break;

    case 'fasilitas-detail';
        include 'pages/fasilitas-detail.php';
        break;


    default;
        include "pages/home.php";
}
