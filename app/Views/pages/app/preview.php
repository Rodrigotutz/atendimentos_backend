<?php $this->layout("components/theme") ?>

<div class="container d-flex flex-column justify-content-center align-items-center" style="min-height: 100vh;">
    <h3>Dados do chamado:</h3>
    
    <form class="container mt-3">

        <div class="row">
          <div class="col-6">
            <div class="mb-3">
              <label for="serviceNumber" class="form-label"> <span class="text-danger">*</span> Número do atendimento:</label>
              <input name="atNumber" type="text" class="form-control" id="serviceNumber" value="<?= $call->at_number ?>" disabled>
            </div>
          </div>

          <div class="col-6">
            <div class="mb-3">
              <label for="name" class="form-label"> <span class="text-danger">*</span> Nome:</label>
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
                <option value="<?= $call->system ?>"><?= $call->system ?></option>
                <option value="SCPI 9">SCPI 9</option>
              </select>
            </div>
          </div>

          <div class="col-6"> 
            <div class="mb-3">
              <label for="situation" class="form-label"> <span class="text-danger">*</span> Situação:</label>
              <select id="situation" class="form-select" name="situation" disabled>
                <option value="<?= $call->situation ?>"><?= $call->situation ?></option>
                <option value="Resolvido">Resolvido</option>
                <option value="Encaminhado">Encaminhado</option>
                <option value="Aguardando Banco">Aguardando Banco</option>
              </select>
            </div>
          </div>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label"> <span class="text-danger">*</span> Caso:</label>
            <textarea name="case" class="form-control" id="exampleFormControlTextarea1" rows="5" disabled><?= $call->call_case ?></textarea>
        </div>

        <div class="d-flex justify-content-between">
            <a href="<?= $router->route("app.index") ?>" class="btn btn-sm btn-light fw-bold"><i class="bi bi-arrow-left "></i> Voltar</a>
            <button type="submit" class="btn btn-sm btn-light fw-bold">Editar</button>
        </div>

    </form>

</div>