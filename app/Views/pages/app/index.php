<?php $this->layout("components/theme") ?>

<div class="container d-flex flex-row justify-content-between align-items-center">
    <h3>Atendimentos</h3>
</div>

<div class="container mt-5 d-flex justify-content-between align-items-center">    
    <?php if($_SESSION['userType'] != "guest"): ?>
        <a href="" class="btn btn-sm btn-light fw-bold"  data-bs-toggle="modal" data-bs-target="#call-modal"><i class="bi bi-plus-square-fill"></i> Novo Atendimento</a>       
    <?php endif; ?>
    <form method="POST">
        <div class="form-outline">
            <input name="query" type="search" id="query" class="form-control form-control-sm" placeholder="Pesquisar por..." />
        </div>
    </form>
</div>


<div class="container mt-3 mb-5 pb-5">

    <?php if(!$calls): ?>
        <div class="text-center mt-5 pt-5">
            <h3 class="text-muted">Não foram encontrados atendimentos...</h3>
        </div>
    <?php else: ?>
    <div class="table-responsive">
        <table class="table table-dark table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Atendimento</th>
                    <th scope="col">Relator</th>
                    <th scope="col">Sistema</th>
                    <th scope="col">Situação</th>
                    <th scope="col">Entidade</th>
                    <th scope="col">Caso</th>
                    <th scope="col"></th>
                </tr>
            </thead>

            <?php foreach($calls as $call): ?>
                <tbody>
                <?php if($call->general_error === 1): ?>
                    <tr class="text-danger">
                <?php else: ?>
                    <tr>
                <?php endif; ?>

                        <th scope="row"><?= $call->at_number ?></th>
                        <td><?= $call->name ?></td>
                        <td><?= $call->system ?></td>
                        <td><?= $call->situation ?></td>
                        <td><?= $call->entity ?></td>
                        <td style="text-overflow: ellipsis; max-width: 15ch; overflow: hidden; white-space: nowrap;"><?= $call->call_case ?></td>
                        <?php if($call->general_error === 1): ?>
                            <td><a href="<?= $router->route("app.preview", ["id" => $call->id]) ?>" class="btn btn-sm btn-danger fw-bold"><i class="bi bi-eye-fill"></i></a></td>
                        <?php else: ?>
                            <td><a href="<?= $router->route("app.preview", ["id" => $call->id]) ?>" class="btn btn-sm btn-light fw-bold"><i class="bi bi-eye-fill"></i></a></td>
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

<!-- Modal -->
<div class="modal fade text-dark" id="call-modal" tabindex="-1" aria-labelledby="formModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="border: none;">
        <h5 class="modal-title" id="formModal"><i class="bi bi-plus-square-fill"></i> Novo Atendimento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="container" action="<?= $router->route("app.register") ?>" method="POST">

        <div class="row">
          <div class="col-6">
            <div class="mb-3">
              <label for="serviceNumber" class="form-label"> <span class="text-danger">*</span> Número do atendimento:</label>
              <input name="atNumber" type="text" class="form-control" id="serviceNumber">
            </div>
          </div>

          <div class="col-6">
            <div class="mb-3">
              <label for="name" class="form-label"> <span class="text-danger">*</span> Relator:</label>
              <input name="name" type="text" class="form-control" id="name">
            </div>
          </div>

          <div class="col-6">
            <div class="mb-3">
              <label for="email" class="form-label"> <span class="text-danger">*</span> Email:</label>
              <input name="email" type="email" class="form-control" id="email">
            </div>
          </div>

          <div class="col-6"> 
            <div class="mb-3">
              <label for="entity" class="form-label"> <span class="text-danger">*</span> Entidade:</label>
              <input name="entity" type="text" class="form-control" id="entity">
            </div>
          </div>

          <div class="col-6"> 
            <div class="mb-3">
              <label for="system" class="form-label"> <span class="text-danger">*</span> Sistema:</label>
              <select id="system" class="form-select" name="system">
                <?php foreach($systems as $system): ?>
                    <option value="<?= $system->title ?>"><?= $system->title ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="col-6"> 
            <div class="mb-3">
              <label for="situation" class="form-label"> <span class="text-danger">*</span> Situação:</label>
              <select id="situation" class="form-select" name="situation">
                <?php foreach($situations as $situation): ?>
                    <option value="<?= $situation->title ?>"><?= $situation->title ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
        </div>

          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label"> <span class="text-danger">*</span> Caso:</label>
            <textarea name="case" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
          </div>

          <div class="mb-3 form-check small">
            <input name="generalError" type="checkbox" class="form-check-input" id="generalError">
            <label class="form-check-label" for="generalError">Erro Geral?</label>
          </div>
          
          <div class="modal-footer" style="border: none;">
            <button type="submit" class="btn btn-dark">Criar</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>