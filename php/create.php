<?php

require_once '../vendor/autoload.php';
require_once 'function.php';
include 'db.php';
session_start();

if (isset($_REQUEST['action']) && $_REQUEST['action'] === 'add') {
    $firstname = strip_tags($_REQUEST['prenom']);
    $lastname = strip_tags($_REQUEST['nom']);
    $adress = strip_tags($_REQUEST['adresse']);
    $phone = strip_tags($_REQUEST['telephone']);
    $idUser = $_SESSION['user_id'];

    $query = $dbCo->prepare('INSERT INTO customer (firstname, lastname, adress, phone, id_user) VALUES (:firstname, :lastname, :adress, :phone, :id)');
    $isQueryOk = $query->execute([
        'firstname' => $firstname,
        'lastname' => $lastname,
        'adress' => $adress,
        'phone' => $phone,
        'id' => $idUser
    ]);

    $query = $dbCo->prepare('SELECT id_customer FROM customer WHERE id_user = :id');
    $query->execute([
        'id' => $idUser
    ]);
    $idCustomer = $query->fetchColumn();
    $query = $dbCo->prepare("INSERT INTO cart (cart_date, id_customer) VALUES (:date, :id)");
    $query->execute([
        'date' => date('Y-m-d'),
        'id' => $idCustomer
    ]);

    $query = $dbCo->prepare('SELECT id_cart FROM cart WHERE id_customer = :id');
    $query->execute([
        'id' => $idCustomer
    ]);
    $idCart = $query->fetchColumn();
    foreach (array_keys($_SESSION['panier']) as $id) {
        $query = $dbCo->prepare("INSERT INTO contains (id_product, id_cart) VALUES(:id, :id2)");
        $query->execute([
            'id' => intval(strip_tags($id)),
            'id2' => $idCart
        ]);
    }
    if ($isQueryOk) {
        $_SESSION['notification'] = "ordered";
    } else {
        $_SESSION['error'] = "not_ordered";
    }
}

header('Location: ../index.php');
