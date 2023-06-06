<?php

use CoffeeCode\Router\Router;

$router = new Router(getenv("APP_URL"), "@");

$router->namespace("App\Controllers");

$router->group(null);
$router->get("/", "Web@home", "web.home");
$router->post("/login", "Web@login", "web.login");

$router->group("app");
$router->get("/", "App@index", "app.index");
$router->get("/logout", "App@logout", "app.logout");

$router->post("/cadastrar", "App@register", "app.register");
$router->get("/ver/{id}", "App@preview", "app.preview");

$router->group("api/v1");
$router->get("/", "Api@show", "api.show");
$router->dispatch();

if($router->error()) {
    dd($router->error());
}