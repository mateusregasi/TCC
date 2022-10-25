<?
require_once __DIR__ . "/../Apps/Controller/Pages/Homepage.php";
require_once __DIR__ . "/../Apps/Controller/Pages/CalendarPage.php";
require_once __DIR__."/../Apps/Controller/Pages/Login.php";

require_once __DIR__ . "/../Apps/Http/Response.php";

$router->get("/", [
             function(){
               return new Response(200, Home::get());
             }
]);
$router->get("/calendario", [
             function(){
               return new Response(200, CalendarPage::get());
             }
]);
$router->get("/login", [
             function(){
               return new Response(200, Login::getLogin());
             }
]);