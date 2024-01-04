<!-- Modal -->
<div class="modal fade text-dark" id="editsituation-modal" tabindex="-1" aria-labelledby="editsituation-modal" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="border: none;">
        <h4 class="modal-title" id="formModal">Editar Situação</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="container" action="<?= $router->route("admin.newsituation") ?>" method="POST">
          <input type="hidden" id="editedSituationId">
          <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input name="title" type="text" class="form-control" id="situationTitle">
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <textarea name="description" id="situationDescription" class="form-control" rows="8"></textarea>
          </div>
          
          <div class="modal-footer" style="border: none;">
            <button type="submit" class="btn btn-dark">Alterar</button>
            <button id="deleteSituation" class="btn btn-danger">Excluir</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    function situationSelected() {
        let select = document.querySelector("#situations")
        let situationModal = document.querySelector("#situationModal").classList.remove('d-none')
        let situationId = document.querySelector("#editedSituationId")
        let situationTitle = document.querySelector("#situationTitle")
        let situationDescription= document.querySelector("#situationDescription")
        let optionValue = select.options[select.selectedIndex]
        let value = optionValue.value
        let deleteSituation = document.querySelector("#deleteSituation")
        
        if(window.location.hostname === "localhost" || location.hostname === "127.0.0.1") {
          getUrl = `http://localhost/atendimentos/backend/admin/show/situation/`
          deleteUrl = `http://localhost/atendimentos/backend/admin/delete/situation/`
          deleteLink = `http://localhost/atendimentos/backend/admin?success=situation-deleted`
        } else {
          getUrl = `https://atendimentos.rodrigotutz.com/admin/show/situation/`
          deleteUrl =`https://atendimentos.rodrigotutz.com/admin/delete/situation/`
          deleteLink = `https://atendimentos.rodrigotutz.com/admin?success=situation-deleted`
        }

        deleteSituation.addEventListener("click", (e) => {
          e.preventDefault();
          $(function() {
            $.ajax({
              method: "POST",
              url: deleteUrl+value,
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
              var situation = JSON.parse(result)
              situationId.value = situation.id
              situationTitle.value = situation.title
              situationDescription.value = situation.description
            }
          })
        })
    }
</script>