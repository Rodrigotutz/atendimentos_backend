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
                <?php foreach($systems as $systems): ?>
                    <option value="<?= $systems->title ?>"><?= $systems->title ?></option>
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