<!-- Modal -->
<div class="modal fade text-dark" id="editsistem-modal" tabindex="-1" aria-labelledby="editsistem-modal" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="border: none;">
        <h4 class="modal-title" id="formModal">Editar sistema</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="container" action="<?= $router->route("admin.newsys") ?>" method="POST">
          <input type="hidden" id="systemId">
          <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input name="title" type="text" class="form-control" id="systemTitle">
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <textarea name="description" id="systemDescription" class="form-control" rows="8"></textarea>
          </div>
          
          <div class="modal-footer" style="border: none;">
            <button type="submit" class="btn btn-dark">Alterar</button>
            <button id="deleteSistem" class="btn btn-danger">Excluir</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    function systemSelected() {
        let select = document.querySelector("#systems")
        let systemModal = document.querySelector("#systemModal").classList.remove('d-none')
        let systemId = document.querySelector("#systemId")
        let systemTitle = document.querySelector("#systemTitle")
        let systemDescription= document.querySelector("#systemDescription")
        let optionValue = select.options[select.selectedIndex]
        let value = optionValue.value
        let deleteSistem = document.querySelector("#deleteSistem")
        
        if(window.location.hostname === "localhost" || location.hostname === "127.0.0.1") {
          getUrl = `http://localhost/atendimentos/backend/admin/show/system/`
          deleteUrl = `http://localhost/atendimentos/backend/admin/delete/system/`
          deleteLink = "http://localhost/atendimentos/backend/admin?success=system-deleted"
        } else {
          getUrl = `https://atendimentos.rodrigotutz.com/admin/show/system/`
          deleteUrl =`https://atendimentos.rodrigotutz.com/admin/delete/system/`
          deleteLink = "https://atendimentos.rodrigotutz.com/admin?success=system-deleted"
        }

        deleteSistem.addEventListener("click", (e) => {
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
            url: getUrl+value,
            success: function(result) {
              var system = JSON.parse(result)
              systemId.value = system.id
              systemTitle.value = system.title
              systemDescription.value = system.description
            }
          })
        })
    }
</script>