<?php
require_once 'vendor/autoload.php';
include 'php/function.php';
include 'php/db.php';
include 'php/notif.php';

session_start();
generateToken();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Game-Family</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="boostrap/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style3.css">
</head>

<body class="bg-light">
    <div class="header">
        <div id="mySidenav" class="sidenav">
            <a id="closeBtn" href="#" class="close">x</a>
            <ul>
                <li><a href="jeu-familiale.php">Jeu Familiale</a></li>
                <li><a href="#">Adulte</a></li>
                <li><a href="#">Casse-tête</a></li>
                <li><a href="#">Puzzle</a></li>
                <li><a href="#">Promotion</a></li>
            </ul>
        </div>
        <a href="#" id="openBtn">
            <span class="burger-icon">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </a>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4">
                <?php
                        if (!isset($_SESSION['user_id'])) {
                            echo "<div class=\"btn-co\">
                    <button class=\"co\"><a href=\"login.php\" class=\"b\">Connexion</a></button>
                  </div>";
                        } else {
                            echo "<div class=\"btn-deco\">
                    <button class=\"deco\"><a href=\"logout.php\" class=\"a\">Deconnexion</a></button>
                  </div>";
                        }
                    ?>
                    <div class="main-search mt_40">
                        <input id="search-input" name="search" value="" placeholder="Recherche" autocomplete="off" type="text">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-default btn-lg"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </div>
                <div class="navbar-header col-xs-8 align-items-center text-center"><a href="index.php"><img class="img-fluid logo" alt="themini" src="images/logo-removebg-preview.png"></a>
                </div>
                <div class="shopcart">
                    <a class="cart" href="#">
                        <img class="cart-img" src="images/cart_icon_160296.png" alt="panier">
                        <span class="cart-nb">0</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php
            if (isset($_SESSION['notification'])){
                $notif = $_SESSION['notification'];
                echo "<div class='notif'>{$msg[$notif]}</div>";
                unset($_SESSION['notification']);
            }
            else if(isset($_SESSION['error'])){
                $error = $_SESSION['error'];
                echo "<div class='error'>{$msg[$error]}</div>";
                unset($_SESSION['error']);
            }
        ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Tenth navbar example">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
                <ul class="navbar-nav">
                    <li class="nav-item me-lg-10">
                        <a class="nav-link active" aria-current="page" href="jeu-familiale.php">Jeu Familiale</a>
                    </li>
                    <li class="nav-item ms-lg-5">
                        <a class="nav-link active" aria-current="page" href="#">Adulte</a>
                    </li>
                    <li class="nav-item ms-lg-5">
                        <a class="nav-link active" aria-current="page" href="#">Casse-tête</a>
                    </li>
                    <li class="nav-item ms-lg-5">
                        <a class="nav-link active" aria-current="page" href="#">Puzzle</a>
                    </li>
                    <li class="nav-item ms-lg-5">
                        <a class="nav-link active" aria-current="page" href="#">Promotion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main>
        <div class="form-customer">
            <form action="php/create.php" method="post">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required><br>
                <input type="hidden" name="token" value="<?=$_SESSION['token']?>">
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" required><br>

                <label for="adresse">Adresse :</label>
                <input type="text" id="adresse" name="adresse" required><br>

                <label for="telephone">Numéro de téléphone :</label>
                <input type="tel" id="telephone" name="telephone" required><br>
                <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
                <input type="hidden" name="action" value="add">
                <input type="submit" value="Envoyer">
            </form>
        </div>
    </main>
    <footer class="bg-dark text-center text-white mt-5">
        <div class="container p-4">
            <section class="">
                <form action="">
                    <div class="row d-flex justify-content-center">
                        <div class="col-auto">
                            <p class="pt-2">
                                <strong>Inscris-toi pour la Newsletter</strong>
                            </p>
                        </div>
                        <div class="col-md-5 col-12">
                            <div class="form-outline form-white mb-4">
                                <input type="email" id="form5Example21" class="form-control" />
                                <label class="form-label" for="form5Example21">Adresse Email</label>
                            </div>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-outline-light mb-4">
                                Abonne-toi
                            </button>
                        </div>
                    </div>
                </form>
            </section>
            <section class="mb-4">
            </section>
            <section class="">
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Réseaux Sociaux</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-white">Facebook</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Twitter</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Instagram</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Avantages</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-white">Abonnement Box</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Parrainage</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Jeux Réscapés</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Infos Clients</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-white">Livraison</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Paiement</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Contactez-Nous</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">FAQ</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">La Société</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-white">Mention Légale</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Qui Sommes Nous</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 Copyright:
            <a class="text-white" href="#">Game-Family.fr</a>
        </div>
    </footer>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>