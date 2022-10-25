<?php

require_once __DIR__ . "/Apps/Http/Request.php";
require_once __DIR__ . "/Apps/Http/Router.php";
require_once __DIR__ . "/Apps/View.php";

define('URL', 'https://principal-tcc.kaylanelima.repl.co');

View::init([
           'home-url' => URL,
           'calendario-url' => URL . "/calendario",
           'login-url' => URL . "/login"
]);

$router = new Router(URL);

include __DIR__ . "/Routes/pages.php";
$router->run()->sendResponse();