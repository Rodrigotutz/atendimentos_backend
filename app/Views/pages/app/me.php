<?php $this->layout("components/theme") ?>

<div class="container d-flex justify-content-center align-items-center flex-column text-center" style="min-height: 100vh;">
    <div class="mb-3">
        <h1><?= $user->first_name ?> <?= $user->last_name ?></h1>
        <h1><?= $user->email ?></h1>
    </div>
    <div>
        <a href="<?= $router->route("app.index") ?>" class="btn btn-light fw-bold"><i class="bi bi-arrow-left"></i> Voltar</a>
        <a href="<?= $router->route("app.logout") ?>" class="btn btn-light fw-bold"><i class="bi bi-door-open"></i> Sair</a>
    </div>
</div>