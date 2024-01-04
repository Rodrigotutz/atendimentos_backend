<?php $this->layout("components/theme") ?>

<div class="d-flex flex-column justify-content-center align-items-center" style="min-height: 90vh;">
    <h2>Ooops 😢</h2>
    <h3>Página não encontrada - <?= $error ?></h3>
    <a href="<?= $router->route("web.home") ?>" class="btn btn-light fw-bold">Voltar</a>
</div>