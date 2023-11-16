<?php

require_once '../vendor/autoload.php';
require_once 'function.php';
include 'db.php';
session_start();
generateToken();
if (isset($_REQUEST['action']) && $_REQUEST['action'] === 'add') {
    $firstname = strip_tags($_REQUEST['prenom']);
    $lastname = strip_tags($_REQUEST['nom']);
    $mail = strip_tags($_REQUEST['mail']);
    $adress = strip_tags($_REQUEST['adresse']);
    $phone = strip_tags($_REQUEST['telephone']);

    $query = $dbCo->prepare('INSERT INTO customer (firstname, lastname, mail, adress, phone) VALUES (:firstname, :lastname, :mail, :adress, :phone)');
    $isQueryOk = $query->execute([
        'firstname' => $firstname,
        'lastname' => $lastname,
        'mail' => $mail,
        'adress' => $adress,
        'phone' => $phone
    ]);
    if ($isQueryOk) {
        header('Location: ../index.php');
    }
}
