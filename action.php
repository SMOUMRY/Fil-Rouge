<?php
require_once 'vendor/autoload.php';
include 'php/function.php';
include 'php/db.php';

session_start();
checkCSRF('index.php');
if (isset($_GET['action']) && $_GET['action'] === 'add') {
    if (isset($_GET['id'])) {
        if (isset($_GET['id']) && $_GET['quantity']) {
            if (!in_array($_GET['id'], $_SESSION)) {
                $_SESSION['panier'] += [$_GET['id'] => intval($_GET['quantity'])];
            }
            $_SESSION['notification'] = 'add';
        } else {
            $_SESSION['error'] = 'not_added';
        }
    }
}

header('Location: jeu-familiale.php');
