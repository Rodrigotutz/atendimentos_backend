<?php

use CoffeeCode\Router\Router;

$router = new Router(getenv("APP_URL"), "@");

$router->namespace("App\Controllers");

/*********ROTAS HOME **********/
$router->group(null);
$router->get("/", "Web@home", "web.home");
$router->get("/alterarsenha", "Web@alterPass", "web.alterpass");
$router->get("/novasenha/{email}/{token}", "Web@newKey", "web.newkey");
$router->post("/novasenha/{email}/{token}", "Web@newKey", "web.newkey");

/********** ROTAS BLOG ********/
$router->group("blog");
$router->get('/', "Blog@home", "blog.home");

/********* ROTAS AUTH *********/
$router->group("auth");
$router->post("/login", "Auth@login", "auth.login");
$router->get("/logout", "Auth@logout", "auth.logout");
$router->post("/cadastrar", "Auth@register", "auth.register");
$router->get("/confirmar/{email}/{token}", "Auth@confirm", "auth.confirm");
$router->post("/resetpass", "Auth@resetPass",  "auth.resetpass");
$router->post("/newpass", "Auth@newPass", "auth.newpass");

/*********ROTAS APP **********/
$router->group("app");
$router->get("/", "App@index", "app.index");
$router->get("/dicas", "App@tips", "app.tips");
$router->post("/", "App@index", "app.index");
$router->get("/perfil", "App@me", "app.me");
$router->get("/deletar/{id}", "App@delete", "app.delete");

$router->get("/ver/{id}", "App@preview", "app.preview");
$router->post("/cadastrar", "App@register", "app.register");
$router->post("/atualizar", "App@update", "app.update");

/*********ROTAS ADMIN **********/
$router->group("admin");
$router->get("/", "Admin@index", "admin.index");
$router->post("/novosistem", "Admin@newSys", "admin.newsys");
$router->post("/novasituacao", "Admin@newSituation", "admin.newsituation");

$router->group("api/v1");
$router->get("/", "Api@show", "api.show");

/******* ROTAS DE ERROS ********/
$router->group("oops");
$router->get("/{errcode}", "Error@index", "error.index");

$router->dispatch();

if($router->error()) {
    $router->redirect("error.index", [
        "errcode" => $router->error()
    ]);
}