<?php
$page = (isset($_GET['page'])) ? $_GET['page'] : '';

switch ($page) {
    case 'data-user':
        include "pages/user/userlist.php";
        break;

    case 'edit-user':
        include "pages/user/edituser.php";
        break;


    case 'data-pakar':
        include "pages/pakar/pakarlist.php";
        break;

    case 'add-pakar':
        include "pages/pakar/addpakar.php";
        break;

    case 'edit-pakar':
        include "pages/pakar/editpakar.php";
        break;

    case 'data-kerusakan';
        include 'pages/kerusakan/kerusakanlist.php';
        break;

    case 'add-kerusakan';
        include 'pages/kerusakan/addkerusakan.php';
        break;

    case 'edit-kerusakan';
        include 'pages/kerusakan/editkerusakan.php';
        break;

    case 'data-gejala';
        include 'pages/gejala/gejalalist.php';
        break;

    case 'add-gejala';
        include 'pages/gejala/addgejala.php';
        break;

    case 'edit-gejala';
        include 'pages/gejala/editgejala.php';
        break;

    case 'data-solusi';
        include 'pages/solusi/solusilist.php';
        break;

    case 'add-solusi';
        include 'pages/solusi/addsolusi.php';
        break;


    case 'edit-solusi';
        include 'pages/solusi/editsolusi.php';
        break;

    default;
        include "pages/user/userlist.php";
}
