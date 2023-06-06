<?php $this->layout("components/theme") ?>

<div class="container mt-5">
    <h3>Dados do chamado:</h3>
    
    <div class="mt-3">
        <h4>Chamado: <?= $call->at_number ?></h4>
        <h4>Nome: <?= $call->name ?></h4>
        <h4>Email: <?= $call->email ?></h4>
        <h4>Entidade: <?= $call->entity ?></h4>
        <h4>Caso: <?= $call->call_case ?></h4>
    </div>

    <div class="mt-3">
    <a href="<?= $router->route("app.index") ?>" class="btn btn-sm btn-light fw-bold"><i class="bi bi-arrow-left "></i> Voltar</a>
    </div>

</div>