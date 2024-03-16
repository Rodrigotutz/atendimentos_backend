<?php $this->layout("components/theme") ?>

<div class="container d-flex flex-column justify-content-center align-items-center mb-5" style="min-height: 100vh;">
    <h3>Dados do chamado:</h3>
    
    <form method="POST" action="<?= $router->route("app.update") ?>" class="container mt-3">
      <input type="hidden" name="id" value="<?= $call->id ?>">
        <div class="row">
          <div class="col-6">
            <div class="mb-3">
              <label for="serviceNumber" class="form-label"> <span class="text-danger">*</span> Atendimento:</label>
              <input name="atNumber" type="text" class="form-control" id="serviceNumber" value="<?= $call->at_number ?>" disabled>
            </div>
          </div>

          <div class="col-6">
            <div class="mb-3">
              <label for="name" class="form-label"> <span class="text-danger">*</span> Relator:</label>
              <input name="name" type="text" class="form-control" id="name" value="<?= $call->name ?>" disabled>
            </div>
          </div>

          <div class="col-6">
            <div class="mb-3">
              <label for="email" class="form-label"> <span class="text-danger">*</span> Email:</label>
              <input name="email" type="email" class="form-control" id="email" value="<?= $call->email ?>" disabled>
            </div>
          </div>

          <div class="col-6"> 
            <div class="mb-3">
              <label for="entity" class="form-label"> <span class="text-danger">*</span> Entidade:</label>
              <input name="entity" type="text" class="form-control" id="entity" value="<?= $call->entity ?>" disabled>
            </div>
          </div>

          <div class="col-6"> 
            <div class="mb-3">
              <label for="system" class="form-label"> <span class="text-danger">*</span> Sistema:</label>
              <select id="system" class="form-select" name="system" disabled>
                  <option value="<?= $call->system ?>" disabled selected hidden><?= $call->system ?></option>
                <?php foreach($systems as $system): ?>
                  <option value="<?= $system->title ?>"><?= $system->title ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="col-6"> 
            <div class="mb-3">
              <label for="situation" class="form-label"> <span class="text-danger">*</span> Situação:</label>
              <select id="situation" class="form-select" name="situation" disabled>
                  <option value="<?= $call->situation ?>" disabled selected hidden><?= $call->situation ?></option>
                <?php foreach($situations as $situation): ?>
                  <option value="<?= $situation->title ?>"><?= $situation->title ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
        </div>

        <div class="mb-3">
            <label for="case" class="form-label"> <span class="text-danger">*</span> Caso:</label>
            <textarea name="case" class="form-control" id="case" rows="5" disabled><?= $call->call_case ?></textarea>
        </div>

        <div class="mb-3 form-check small">
          <?php if($call->general_error === 1): ?>
            <input name="generalError" type="checkbox" class="form-check-input" id="generalError" checked disabled>
          <?php else: ?>
            <input name="generalError" type="checkbox" class="form-check-input" id="generalError" disabled>
          <?php endif; ?>
            <label class="form-check-label" for="generalError">Erro Geral?</label>
        </div>

        <div class="d-flex justify-content-between">
            <a href="<?= $router->route("app.index") ?>" class="btn btn-sm btn-light fw-bold"><i class="bi bi-arrow-left "></i> Voltar</a>
            <div class="d-flex gap-3">
              <?php if($_SESSION['userType'] != "guest"): ?>
                <button type="submit" id="saveButton" class="d-none btn btn-sm btn-success fw-bold"><i class="bi bi-pencil-square"></i> Salvar</button>

                <?php if($call->user_id === $_SESSION["userId"] || $_SESSION['userType'] === "admin"):?>
                  <button type="button" id="editButton" class="btn btn-sm btn-primary fw-bold"><i class="bi bi-pencil-square"></i> Editar</button>
                  <a data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-sm btn-danger fw-bold"><i class="bi bi-trash-fill"></i> Excluir</a>
                <?php endif; ?>
              <?php endif; ?>
            </div>
        </div>

    </form>

    <form action="<?= $router->route("app.delete", ["id" => $call->id]) ?>" method="get">
      <div class="modal fade text-dark p-5" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header" style="border: none;">
              <h5 class="modal-title">Confirmar</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <h4 class="text-center">Tem certeza que deseja excluir?</h4>
            </div>

            <div class="modal-footer" style="border: none;">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-danger">Excluir</button>
            </div>
          </div>
        </div>
      </div>
    </form>

</div>

<?= $this->start("scripts") ?>
  <script src="<?= asset("js/app.js") ?>"></script>
<?= $this->stop() ?>