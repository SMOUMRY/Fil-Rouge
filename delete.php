<?php
require_once 'vendor/autoload.php';
include 'php/function.php';
include 'php/db.php';

session_start();
checkCSRF('index.php');

if (isset($_GET['action']) && $_GET['action'] === 'delete') {
    if (isset($_GET['id'])) {
        unset($_SESSION['panier'][$_GET['id']]);
        $_SESSION['notification'] = 'delete';
    }
    else {
        $_SESSION['error'] = 'not_deleted';
    }
}
header('Location: cart.php');