<?php
require_once 'vendor/autoload.php';
include 'php/function.php';
include 'php/db.php';

session_start();
/* CSRF check before anything */
checkCSRF('singin.php');
if (isset($_REQUEST['signin'])) {
    if (!isset($_REQUEST['nickname']) || !isset($_REQUEST['email']) || !isset($_REQUEST['pwd']) || !isset($_REQUEST['pwd_verif']) || !isset($_REQUEST['birthdate'])) return;

    /* Store Form info */



    /* REGEX to validate a strong password */
    if (!preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])((?=.*\W)|(?=.*_))^[^ ]+$/", $_REQUEST['pwd'])) {
        $_SESSION['form_email'] = $_REQUEST['email'];
        $_SESSION['form_nickname'] = $_REQUEST['nickname'];
        $_SESSION['form_birthdate'] = $_REQUEST['birthdate'];
        $_SESSION['error'] = 'Le mot de passe doit contenir 1 Majuscule, 1 Minuscule, 1 Chiffre, 1 Symbole au minimum.';
        header('Location: signin.php');
    } else {

        try {
            $dbCo->beginTransaction();

            /* Try to fetch an existing email */
            $checkEmail = $dbCo->prepare('SELECT email FROM user WHERE email = :email');
            $checkEmail->bindValue(':email', $_REQUEST['email'], PDO::PARAM_STR);
            $checkEmail->execute();
            if ($checkEmail->rowCount()) {
                throw new Exception('Adresse Email déjà utilisée !');
            }
            /* Try to fetch an existing nickname */
            $checkNickname = $dbCo->prepare('SELECT nickname FROM user WHERE nickname = :nickname');
            $checkNickname->bindValue(':nickname', $_REQUEST['nickname'], PDO::PARAM_STR);
            $checkNickname->execute();
            if ($checkNickname->rowCount()) {
                throw new Exception('Nom d\'utilisateur déjà utilisé !');
            }
            /* CREATE a new user entry */
            $userCreation = $dbCo->prepare('INSERT INTO `user` (nickname, email, password, birthdate) VALUES (:nickname, :email, :pwd, :bd);');
            $userCreation->bindValue(':nickname', $_REQUEST['nickname'], PDO::PARAM_STR);
            $userCreation->bindValue(':email', $_REQUEST['email'], PDO::PARAM_STR);
            $userCreation->bindValue(':pwd', password_hash($_REQUEST['pwd'], PASSWORD_DEFAULT), PDO::PARAM_STR);
            $userCreation->bindValue(':bd', $_REQUEST['birthdate'], PDO::PARAM_STR);

            $userCreation->execute();

            if (!$userCreation->rowCount()) throw new Exception("Problème de requête");
            /* Redirect to login in case of sucess */
            if ($dbCo->commit()) {
                $_SESSION['notification'] = 'created';
                header('Location: login.php');
            }
        } catch (Exception $error) {
            $dbCo->rollBack();
            $_SESSION['error'] = "not_created";
            header('Location: signin.php');
        }
    }
}
if (isset($_REQUEST['login'])) {
    if (!isset($_REQUEST['username']) || !isset($_REQUEST['password'])) return;
    else {

        try {
            $dbCo->beginTransaction();
            $userLogin = $dbCo->prepare('SELECT * FROM user WHERE nickname = :username');
            $userLogin->bindValue(':username', $_REQUEST['username'], PDO::PARAM_STR);

            $userLogin->execute();

            if (!$userLogin->rowCount()) throw new Exception('Nombre incohérent de lignes affectées par la suppression.');


            $user = $userLogin->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($_REQUEST['password'], $user['password'])) {
                var_dump('oui');
                $_SESSION['user_id'] = $user['id_user'];
                $_SESSION['expiracy'] = time() + 20 * 60;
                $_SESSION['notification'] = 'connected';
                header('Location: index.php');
            } else throw new Exception('Mot de passe incorrect');

            if (!$dbCo->commit()) throw new Exception('Erreur de commit en BDD');
        } catch (Exception $error) {
            $dbCo->rollBack();
            $_SESSION['error'] = 'password';
            header("Location: login.php");
        }
    }
}