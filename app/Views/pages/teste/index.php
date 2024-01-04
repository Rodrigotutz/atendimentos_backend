<?php $this->layout("components/theme") ?>

<div class="d-flex flex-column justify-content-center align-items-center" style="min-height: 90vh;">
    <h1>Página de Testes</h1>

    <form class="d-flex flex-column mt-5" enctype="multipart/form-data" action="<?= $router->route("upload.txtupload") ?>" method="POST">
        <label class="form-label" for="file">Selecione seu arquivo .txt</label>
        <input type="file" class="form-control" id="file" name="file">
        <div class="text-center mt-3">
            <button type="submit" class="btn btn-light fw-bold">Enviar</button>
        </div>
    </form>

    <div class="mt-3">
        <?php if(isset($testes)): ?>
            <?php foreach($testes as $teste): ?>
                <h5><?= $teste->at_number ?></h5>
            <?php endforeach; ?>
        <?php else: ?>    
            <h3 class="text-muted">Nenhum atendimento encontrado</h3>
        <?php endif ?>
    </div>
</div>