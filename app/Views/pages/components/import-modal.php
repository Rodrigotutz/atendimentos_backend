<!-- Modal -->
<div class="modal fade text-dark" id="import-modal" tabindex="-1" aria-labelledby="formModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="border: none;">
        <h5 class="modal-title" id="formModal"><i class="bi bi-plus-square-fill"></i> Importar Atendimento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="container"enctype="multipart/form-data" action="<?= $router->route("upload.txtupload") ?>" method="POST">

          <div class="mb-3">
            <label class="form-label" for="file">Selecione seu arquivo .txt</label>
            <input type="file" class="form-control" id="file" name="file" required>
          </div>

          <div class="modal-footer justify-content-between" style="border: none;">
            <a href="<?= asset("layout/layout.txt") ?>" download class="btn btn-primary"><i class="bi bi-archive-fill"></i> Baixar Layout</a>
            <button type="submit" class="btn btn-dark "><i class="bi bi-arrow-down-square-fill"></i> Importar</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>