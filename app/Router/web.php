<?php

use CoffeeCode\Router\Router;

$router = new Router(getenv("APP_URL"), "@");

$router->namespace("App\Controllers");

$router->group(null);
$router->get("/", "Web@home", "web.home");
$router->get("/confirmar/{email}/{token}", "Web@confirm", "web.confirm");
$router->post("/login", "Web@login", "web.login");
$router->post("/cadastrar", "Web@register", "web.register");

$router->group("app");
$router->get("/", "App@index", "app.index");
$router->get("/logout", "App@logout", "app.logout");
$router->get("/perfil", "App@me", "app.me");
$router->get("/deletar/{id}", "App@delete", "app.delete");

$router->get("/ver/{id}", "App@preview", "app.preview");
$router->post("/cadastrar", "App@register", "app.register");
$router->post("/atualizar", "App@update", "app.update");

$router->group("api/v1");
$router->get("/", "Api@show", "api.show");
$router->dispatch();

if($router->error()) {
    dd($router->error());
}