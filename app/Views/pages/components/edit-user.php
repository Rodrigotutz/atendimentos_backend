<!-- Modal -->
<div class="modal fade text-dark" id="edituser-modal" tabindex="-1" aria-labelledby="formModal" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="border: none;">
        <h3>Editar Usuário</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="container" action="<?= $router->route("admin.newuser") ?>" method="POST">
        <input type="hidden" id="editedUserId">
          <div class="row">
            <div class="mb-3 col-6">
              <label for="first_name" class="form-label">Nome:</label>
              <input name="first_name" type="text" class="form-control" id="editedUserName">
            </div>

            <div class="mb-3 col-6">
              <label for="last_name" class="form-label">Sobrenome:</label>
              <input name="last_name" type="text" class="form-control" id="editedUserLastName">
            </div>
          </div>

          <div class="row">
            <div class="mb-3 col-8">
            <label for="email" class="form-label"> Email:</label>
            <input name="email" type="email" class="form-control" id="editedUserEmail" readonly>
            </div>

            <div class="mb-3 col-4">
                <label for="password_re" class="form-label ">Tipo de usuário:</label>
                <select name="type" id="editUserType" class="form-select">
                    <option value="guest">Usuário</option>
                    <option value="user">Suporte</option>
                    <option value="admin">Administrador</option>
                </select>
            </div>

          </div>

          <div class="modal-footer" style="border: none;">
            <button type="submit" class="btn btn-dark">Alterar</button>
            <button  id="deleteUser" class="btn btn-danger">Excluir</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    function userSelected() {
        let select = document.querySelector("#users")
        let userModal = document.querySelector("#userModal").classList.remove('d-none')
        let editUserId = document.querySelector("#editedUserId")
        let editUserName= document.querySelector("#editedUserName")
        let editUserLastName = document.querySelector("#editedUserLastName")
        let editUserEmail = document.querySelector("#editedUserEmail")
        let editUserType = document.querySelector("#editUserType")
        let optionValue = select.options[select.selectedIndex]
        let value = optionValue.value
        let deleteUser = document.querySelector("#deleteUser")

        if(window.location.hostname === "localhost" || location.hostname === "127.0.0.1") {
          getUrl = `http://localhost/atendimentos/backend/admin/show/user/`
          deleteUrl = `http://localhost/atendimentos/backend/admin/delete/user/`
          deleteLink = `http://localhost/atendimentos/backend/admin?success=user-deleted`
        } else {
          getUrl = `https://atendimentos.rodrigotutz.com/admin/show/user/`
          deleteUrl =`https://atendimentos.rodrigotutz.com/admin/delete/user/`
          deleteLink = `https://atendimentos.rodrigotutz.com/admin?success=user-deleted`
        }

        deleteUser.addEventListener("click", (e) => {
          e.preventDefault();
          $(function() {
            $.ajax({
              method: "POST",
              url: deleteUrl + value,
              success: function(result) {
                window.location.href = deleteLink;
              }
            })
          })
        })

        $(function() {
          $.ajax({
            method: "GET",
            url: getUrl + value,
            success: function(result) {
              var user = JSON.parse(result)
              editUserId.value = user.id
              editUserName.value = user.first_name
              editUserLastName.value = user.last_name
              editUserEmail.value = user.email
              editUserType.value = user.type
            }
          })
        })
    }
</script>