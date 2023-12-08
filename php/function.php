<?php

function generateToken()
{
    if (!isset($_SESSION['token']) || time() > $_SESSION['tokenExpire']) {
        $_SESSION['token'] = md5(uniqid(mt_rand(), true));
        $_SESSION['tokenExpire'] = time() + 15 * 60;
    }
}

/**
 * Run the basic verification for token and REFERER to avoid CSRF 
 * injection.
 * Redirect in case of error.
 *
 * @param string $url
 * @return void
 */
function checkCSRF(string $url): void
{
    if (!isset($_SERVER['HTTP_REFERER']) || !str_contains($_SERVER['HTTP_REFERER'], 'http://localhost/Fil%20Rouge/')) {
        exit;
    } else if (!isset($_SESSION['token'])  || $_SESSION['tokenExpire'] < time()) {
        exit;
    }
}