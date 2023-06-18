<!-- Modal -->
<div class="modal fade text-dark" id="newsituation-modal" tabindex="-1" aria-labelledby="newsituation" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="border: none;">
        <h4 class="modal-title" id="formModal">Nova Situação</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="container" action="<?= $router->route("admin.newsituation") ?>" method="POST">

          <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input name="title" type="text" class="form-control" id="name">
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <textarea name="description" id="description" class="form-control" rows="8"></textarea>
          </div>
          
          <div class="modal-footer" style="border: none;">
            <button type="submit" class="btn btn-dark">Cadastrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>