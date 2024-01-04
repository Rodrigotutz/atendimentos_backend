<!-- Modal -->
<div class="modal fade text-dark" id="newuser-modal" tabindex="-1" aria-labelledby="formModal" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="border: none;">
        <h3>Novo usuário</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="container" action="<?= $router->route("admin.newuser") ?>" method="POST">
          <div class="row">
            <div class="mb-3 col-6">
              <label for="first_name" class="form-label">Nome:</label>
              <input name="first_name" type="text" class="form-control" id="first_name">
            </div>

            <div class="mb-3 col-6">
              <label for="last_name" class="form-label">Sobrenome:</label>
              <input name="last_name" type="text" class="form-control" id="last_name">
            </div>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label"> Email:</label>
            <input name="email" type="email" class="form-control" id="email">
          </div>

          <div class="row">
            <div class="mb-3 col-6">
              <label for="password" class="form-label">Senha:</label>
              <input name="password" type="text" class="form-control reg_pass" id="password">
            </div>

            <div class="mb-3 col-6">
                <label for="password_re" class="form-label ">Tipo de usuário:</label>
                <select name="type" id="type" class="form-select">
                    <option value="guest">Usuário</option>
                    <option value="user">Suporte</option>
                    <option value="admin">Administrador</option>
                </select>
            </div>

          </div>

          <div class="modal-footer" style="border: none;">
            <button type="submit" class="btn btn-dark">Cadastrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



