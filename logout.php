<?php

session_start();

// Supprimer toutes les variables de session.
unset($_SESSION);


// Finalement, détruire la session.
session_destroy();

session_start();
// Rediriger vers la page de connexion.
$_SESSION['notification'] = 'deconnected';
header('Location: index.php');
exit;