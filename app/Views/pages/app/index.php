<?php $this->layout("components/theme") ?>

<div class="container d-flex justify-content-between align-items-center">
    <h3>Atendimentos</h3>
</div>

<div class="container mt-5 d-flex justify-content-between align-items-center ">    
    <?php if($_SESSION['userType'] != "guest"): ?>
        <a href="" class="btn btn-sm btn-light fw-bold"  data-bs-toggle="modal" data-bs-target="#call-modal"><i class="bi bi-plus-square-fill"></i> Novo Atendimento</a>       
    <?php endif; ?>
    <div class="d-flex flex-row gap-2">
        <form method="POST" class="d-flex gap-2">
            <div class="form-outline">
                <input name="query" type="search" class="form-control form-control-sm" placeholder="Pesquisar por..." />
            </div>
            <div class="form-outline">
                <input type="date" name="date" class="form-control form-control-sm"> 
            </div>
        </form>
        <?php if($_SESSION['userType'] != "guest"): ?>
            <a href="" class="btn btn-sm btn-light fw-bold"  data-bs-toggle="modal" data-bs-target="#import-modal"><i class="bi bi-arrow-down-square-fill"></i></a>       
        <?php endif; ?>
    </div>
</div>


<div class="container mt-3 mb-5 pb-5">

    <?php if(!$calls): ?>
        <div class="text-center mt-5 pt-5">
            <h3 class="text-muted">Não foram encontrados atendimentos...</h3>
        </div>
    <?php else: ?>
    <div class="table-responsive">
        <table class="table table-dark table-striped table-hover" id="callTable">
            <thead>
                <tr>
                    <th scope="col">Atendimento</th>
                    <th scope="col">Relator</th>
                    <th scope="col">Sistema</th>
                    <th scope="col">Entidade</th>
                    <th scope="col">Caso</th>
                    <th scope="col">Situação</th>
                    <th scope="col">Criado em</th>
                    <th scope="col"></th>
                </tr>
            </thead>

            <?php foreach($calls as $call): ?>
                <tbody>
                <?php if($call->general_error == true): ?>
                    <tr class="text-danger">
                <?php else: ?>
                    <tr>
                <?php endif; ?>
                        <th><?= $call->at_number ?></th>
                        <td><?= $call->name ?></td>
                        <td><?= $call->system?></td>
                        <td><?= $call->entity ?></td>
                        <td style="text-overflow: ellipsis; max-width: 15ch; overflow: hidden; white-space: nowrap;"><?= $call->call_case ?></td>
                        <td><?= $call->situation?></td>

                        <td><?= (new DateTime($call->created_at))->format("d/m/Y")?></td>
                        
                        <?php if($call->general_error === 1): ?>
                            <td>
                                <!--<a href="<?= $router->route("app.preview", ["id" => $call->id]) ?>" class="btn btn-sm btn-danger fw-bold"><i class="bi bi-eye-fill"></i></a>-->
                                <button id="updateCall" class="btn btn-sm btn-light fw-bold editButton" data-id="<?= $call->id ?>" data-bs-toggle="modal" data-bs-target="#updatecall-modal" ><i class="bi bi-pen-fill"></i></button>
                            </td>
                        <?php else: ?>
                            <td>
                                <!--<a href="<?= $router->route("app.preview", ["id" => $call->id]) ?>" class="btn btn-sm btn-light fw-bold"><i class="bi bi-eye-fill"></i></a>-->
                                <button id="updateCall" class="btn btn-sm btn-light fw-bold editButton" data-id="<?= $call->id ?>" data-bs-toggle="modal" data-bs-target="#updatecall-modal" ><i class="bi bi-pen-fill"></i></button>   
                            </td>
                        <?php endif; ?>
                    </tr>
                </tbody>
            <?php endforeach; ?>
        </table>
    </div>
    
    <div class="d-flex justify-content-between">
        <div>
            <span>Legenda:</span>
            <span class="text-danger">Erro Geral</span>
        </div>
        <div>
            <span>Total de Chamados:</span>
            <span><?= $registers ?></span>
        </div>
    </div>
    <?php endif; ?>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<?php $this->insert("components/call-modal") ?>
<?php $this->insert("components/updatecall-modal") ?>
<?php $this->insert("components/import-modal") ?>

