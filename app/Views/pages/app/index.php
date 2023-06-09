<?php $this->layout("components/theme") ?>

<div class="container mt-5 d-flex flex-row justify-content-between align-items-center">
    <h3>Atendimentos</h3>
    <div class="d-flex gap-3 align-items-center">
    <a href="<?= $router->route("app.me") ?>" class="btn btn-light"><i class="bi bi-person-circle"></i> Perfil</a>
    </div>
</div>

<div class="container mt-5 d-flex justify-content-between align-items-center">    
    <a href="" class="btn btn-light fw-bold"  data-bs-toggle="modal" data-bs-target="#call-modal"><i class="bi bi-plus-square-fill"></i> Novo Atendimento</a>
    <form action="" class="d-flex input-group-sm">
        <input type="text" class="form-control input-sm" style="width: 200px;" placeholder="Pesquisar por...">
        <button class="btn btn-light" style="margin-left: -40px;"><i class="bi bi-search"></i></button>
    </form>
</div>

<div class="container mt-3">
    <small class="text-<?= $class ?>"><?= $message ?></small>
</div>

<?php $this->insert("components/modal") ?>

<div class="container mt-3 mb-5 pb-5">

    <?php if(!$calls): ?>
        <div class="text-center mt-5 pt-5">
            <h3 class="text-muted">Não existem atendimentos...</h3>
        </div>
    <?php else: ?>
    <div class="table-responsive">
    <table class="table table-dark table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Numero At.</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Entidade</th>
                <th scope="col">Caso</th>
                <th scope="col"></th>
            </tr>
        </thead>

        <?php foreach($calls as $call): ?>
            <tbody>
                <tr>
                    <th scope="row"><?= $call->at_number ?></th>
                    <td><?= $call->name ?></td>
                    <td><?= $call->email ?></td>
                    <td><?= $call->entity ?></td>
                    <td style="text-overflow: ellipsis; max-width: 15ch; overflow: hidden; white-space: nowrap;"><?= $call->call_case ?></td>
                    <td><a href="<?= $router->route("app.preview", ["id" => $call->id]) ?>" class="btn btn-sm btn-light fw-bold"><i class="bi bi-eye-fill"></i></a></td>
                </tr>
            </tbody>     
        <?php endforeach; ?>
    </table>
    </div>
    <?php endif; ?>
</div>

