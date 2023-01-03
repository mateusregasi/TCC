<?php

$path = __DIR__ . "/../Apps/Controller/Pages";
$controllers = array_diff(scandir($path), ["..", "."]);
foreach($controllers as $controller){
  if(file_exists("$path/$controller")) include_once "$path/$controller";
}

require_once __DIR__ . "/../Apps/Http/Response.php";

$router->get("/", [
             function(){
               return new Response(200, HomePage::get());
             }
]);

$router->get("/calendario", [
             function(){
               return new Response(200, CalendarPage::get());
             }
]);

$router->get("/agendamento", [
             function(){
               return new Response(200, SchedulingPage::get());
             }
]);
$router->post("/agendamento", [
             function(){
               return new Response(200, SchedulingPage::get());
             }
]);

$router->post("/calendario", [
             function($request){
               return new Response(200, CalendarPage::get($request));
             }
]);

$router->get("/login", [
             function(){
               return new Response(200, LoginPage::get());
             }
]);

$router->post("/login", [
             function($request){
               return new Response(200, LoginPage::get($request));
             }
]);

$router->get("/cadastrar-usuario", [
             function(){
               return new Response(200, RegisterUserPage::get());
             }
]);

$router->post("/cadastrar-usuario", [
             function($request){
               return new Response(200, RegisterUserPage::insert($request));
             }
]);

$router->get('/usuario/{name}', [
             function($request, $name){
               return new Response(200, UserPage::get($request, $name));
             }
]);

$router->get('/adicionar-item', [
             function(){
               return new Response(200, AddItemPage::get());
             }
]);