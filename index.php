<?php
$request = $_SERVER['REQUEST_URI'];
$request = explode('?', $request)[0];

if($request == '' || $request == '/') {
    require './pages/main.php';
}
elseif($request == '/login' || $request == '/login/') {
    require './pages/login.html';
}
elseif($request == '/signup' || $request == '/signup/') {
    require './pages/signup.html';
}
elseif (preg_match('/^\/products(\/)/', $request)) {
    $request = str_replace('/products', '', $request);
    $part = explode('/', $request);
    $productID = $part[1];
    if (preg_match('/^\/[0-9]+$/', $request)) {
        require './pages/details.php';
    } elseif (preg_match('/^\/[0-9]+\/Update$/', $request)) {
        echo $request;
    }
}
?>