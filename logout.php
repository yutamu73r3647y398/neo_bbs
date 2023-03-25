<?php
session_start(); 

// セッション情報を削除
$_SESSION = array();
// , 1を追加
if (ini_set("session.use_cookies", 1)) {
    $params = session_get_cookie_params();
    setcookie(session_name() . '', time() - 42000,
        $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}

session_destroy();

// Cookie情報も削除
setcookie('password', '', time()-3600);

header('Location: login.php');
exit();
?>