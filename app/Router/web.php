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


$router->post("/txtupload", "Upload@txtUpload", "upload.txtupload");

/*********ROTAS ADMIN **********/
$router->group("admin");
$router->get("/", "Admin@index", "admin.index");
$router->post("/novosistem", "Admin@newSys", "admin.newsys");
$router->post("/novasituacao", "Admin@newSituation", "admin.newsituation");

$router->post("/novousuario", "Admin@newUser", "admin.newuser"); 

$router->get("/show/user/{id}", "Admin@getUser", "admin.getuser");
$router->post("/delete/user/{id}", "Admin@deleteUser", "admin.deleteuser");
$router->post("/update/user/{data}", "Admin@updateUser", "admin.updateuser");

$router->get("/show/situation/{id}", "Admin@getSituation", "admin.getsituation");
$router->post("/delete/situation/{id}", "Admin@deleteSituation", "admin.deletesituation");

$router->get("/show/system/{id}", "Admin@getSystem", "admin.getsystem");
$router->post("/delete/system/{id}", "Admin@deleteSystem", "admin.deletesystem");

/***********ROTAS API***********/
$router->group("api/v1");
$router->get("/", "Api@show", "api.show");
$router->get("/pesquisa/{query}", "Api@query", "api.query");

/******* ROTAS DE ERROS ********/
$router->group("oops");
$router->get("/{errcode}", "Error@index", "error.index");

$router->group("/teste");
$router->get('/', "Teste@index", "teste.index");
$router->post('/upload', "Teste@txtUpload", "teste.txtupload");

$router->dispatch();

if($router->error()) {
    $router->redirect("error.index", [
        "errcode" => $router->error()
    ]);
}