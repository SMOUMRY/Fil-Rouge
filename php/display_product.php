<?php
//     echo "<li class=\"jeu-itm col-4 text-center item\" data-id=\"{$product['id_product']}\" data-editor=\"{$product['editor']}\" data-age=\"{$product['age']}\" data-joueur=\"{$product['players']}\">
//     <img class=\"jeu-img w-50 h-50 align-self-center mt-4\" src=\"images/{$product['image']}\" alt=\"{$product['name_product']}\">
//     <h2 class=\"jeu-ttl mt-4 mb-4\">{$product['name_product']}</h2>
//     <p class=\"lead text-center mt-5 fs-1\"><span class=\"jeu-price\">{$product['price']}</span>€</p>
//     <input class=\"add-qty\" type=\"text\" value=\"1\">
//     <button type=\"button\" class=\"cart-item btn btn-primary\"><span class=\"bi bi-cart\"></span>Ajoutez au panier</button>
// </li>";

$query = $dbCo->prepare("SELECT id_product, name_product, price, editor, age, players, image FROM product;");
$query->execute();
foreach($query->fetchAll() as $product){
        echo "<li class=\"jeu-itm col-4 text-center item\" data-id=\"{$product['id_product']}\" data-editor=\"{$product['editor']}\" data-age=\"{$product['age']}\" data-joueur=\"{$product['players']}\">
    <img class=\"jeu-img w-50 h-50 align-self-center mt-4\" src=\"images/{$product['image']}\" alt=\"{$product['name_product']}\">
    <h2 class=\"jeu-ttl mt-4 mb-4\">{$product['name_product']}</h2>
    <p class=\"lead text-center mt-5 fs-1\"><span class=\"jeu-price\">{$product['price']}</span>€</p>
    <input class=\"add-qty\" type=\"text\" value=\"1\">
    <button type=\"button\" class=\"cart-item btn btn-primary\"><span class=\"bi bi-cart\"></span><a href=\"\" class='link'>Ajoutez au panier</a></button>
</li>";
}