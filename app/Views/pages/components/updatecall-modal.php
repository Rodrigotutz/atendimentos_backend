<!-- Modal -->
<div class="modal fade text-dark" id="updatecall-modal" tabindex="-1" aria-labelledby="formModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="border: none;">
        <h5 class="modal-title" id="formModal"><i class="bi bi-pen-fill"></i> Editar Atendimento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="container" action="<?= $router->route("app.update") ?>" method="POST">

        <input type="hidden" id="callId" name="id">

        <div class="row">
          <div class="col-6">
            <div class="mb-3">
              <label for="serviceNumber" class="form-label"> <span class="text-danger">*</span> Número do atendimento:</label>
              <input name="atNumber" type="text" class="form-control" id="updateCallNumber">
            </div>
          </div>

          <div class="col-6">
            <div class="mb-3">
              <label for="name" class="form-label"> <span class="text-danger">*</span> Relator:</label>
              <input name="name" type="text" class="form-control" id="updateCallName">
            </div>
          </div>

          <div class="col-6">
            <div class="mb-3">
              <label for="email" class="form-label"> <span class="text-danger">*</span> Email:</label>
              <input type="email" class="form-control" id="updateCallEmail" disabled readonly>
            </div>
          </div>

          <div class="col-6"> 
            <div class="mb-3">
              <label for="entity" class="form-label"> <span class="text-danger">*</span> Entidade:</label>
              <input name="entity" type="text" class="form-control" id="updateCallEntity">
            </div>
          </div>

          <div class="col-6"> 
            <div class="mb-3">
              <label for="updateCallSystem" class="form-label"> <span class="text-danger">*</span> Sistema:</label>
              <select id="updateCallSystem" class="form-select" name="system">
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
            <label for="callUpdateCase" class="form-label"> <span class="text-danger">*</span> Caso:</label>
            <textarea name="case" class="form-control" id="callUpdateCase" rows="5"></textarea>
          </div>

          <div class="mb-3 form-check small">
            <input name="generalError" type="checkbox" class="form-check-input" id="updateGeneralError">
            <label class="form-check-label" for="updateGeneralError">Erro Geral?</label>
          </div>
          
          <div class="modal-footer" style="border: none;">
            <button class="btn btn-danger" id="deleteCall">Excluir</button>
            <button type="submit" class="btn btn-success">Atualizar</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>



<script>

  if(window.location.hostname === "localhost" || location.hostname === "127.0.0.1") {
    getUrl = `http://localhost/atendimentos/backend/app/ver/`
    deleteUrl = `http://localhost/atendimentos/backend/app/deletar/`
    deleteLink = `http://localhost/atendimentos/backend/app?success=call-deleted`
  }

  $(document).ready(function() {
    $('#callTable').on('click', '.editButton', function() {
      var callId = $(this).data('id');
      $("#callId").val(callId)

      $("#deleteCall").click((e) => {
        e.preventDefault();
        $.ajax({
          method: "GET",
          url: deleteUrl + callId,
          success: function(result) {
            window.location.href = deleteLink;
          }
        })
      })

      $.ajax({
        method: "GET",
        url: getUrl + callId,
        success: function(result) {
          var call = JSON.parse(result)
          $("#updateCallNumber").val(call.at_number)
          $("#updateCallName").val(call.name)
          $("#updateCallEmail").val(call.email)
          $("#updateCallEntity").val(call.entity)
          $("#updateCallSystem").val(call.system)
          $("#callUpdateCase").val(call.call_case)
          $("#updateGeneralError").prop('checked', call.general_error)
        }
      })
    });
  })

  
</script>