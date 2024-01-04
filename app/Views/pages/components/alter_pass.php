<!-- Modal -->
<div class="modal fade text-dark" id="pass-modal" tabindex="-1" aria-labelledby="passmodal" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="border: none;">
        <h4 class="modal-title" id="formModal">Altere sua senha</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="container" action="<?= $router->route("auth.newpass") ?>" method="POST">

          <div class="mb-3">
            <label for="password" class="form-label">Senha atual:</label>
            <input name="password" type="text" class="form-control reg_pass" id="password">
          </div>
          <div class="mb-3">
            <label for="newpass" class="form-label ">Nova Senha:</label>
            <input name="newpass" type="text" class="form-control" id="newpass">
          </div>
          
          <div class="modal-footer" style="border: none;">
            <button type="submit" class="btn btn-dark">Cadastrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>