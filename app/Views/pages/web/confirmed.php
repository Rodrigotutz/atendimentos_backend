<?php $this->layout("components/theme") ?>

<div class="container d-flex justify-content-center align-items-center flex-column" style="min-height: 100vh;">
    <h2>Seu e-mail foi confirmado</h2>
    <a href="<?= $router->route("web.home") ?>" class="btn btn-light btn-lg fw-bold">Voltar para o login</a>
</div>