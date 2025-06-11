<?php
$page = (isset($_GET['page'])) ? $_GET['page'] : '';

switch ($page) {
    case 'data-user':
        include "pages/user/userlist.php";
        break;

    case 'data-pakar':
        include "pages/pakar/pakarlist.php";
        break;

    case 'add-pakar':
        include "pages/pakar/addpakar.php";
        break;

    case 'data-kerusakan';
        include 'pages/kerusakan/kerusakanlist.php';
        break;

    case 'add-kerusakan';
        include 'pages/kerusakan/addkerusakan.php';
        break;

    case 'data-gejala';
        include 'pages/gejala/gejalalist.php';
        break;

    case 'data-solusi';
        include 'pages/solusi/solusilist.php';
        break;


    default;
        include "pages/user/userlist.php";
}
