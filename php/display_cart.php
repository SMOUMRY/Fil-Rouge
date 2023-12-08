<?php

$totalPrice = 0;
foreach (array_keys($_SESSION['panier']) as $id){
    $query = $dbCo->prepare("SELECT id_product, name_product, price, image FROM product WHERE id_product = :id");
    $query->execute([
        'id' => intval(strip_tags($id))
    ]);
    $product = $query->fetch();
        echo "<li class=\"jeu-itm col-4 text-center item\" data-id=\"{$product['id_product']}\">
        <a href=\"delete.php?action=delete&id={$product['id_product']}\" class='cross'>❌</a>
        <img class=\"jeu-img w-50 h-50 align-self-center mt-4\" src=\"images/{$product['image']}\" alt=\"{$product['name_product']}\">
        <h2 class=\"jeu-ttl mt-4 mb-4\">{$product['name_product']}</h2>
        <input type=\"hidden\" name=\"{$product['id_product']}\">
        <p class=\"lead text-center mt-5 fs-1\"><span class=\"jeu-price\">{$product['price']}</span>€</p>
        <input class=\"add-qty\" type=\"text\" value=\"{$_SESSION['panier'][$product['id_product']]}\">
    </li>";
    $totalPrice += $product['price'];
}

