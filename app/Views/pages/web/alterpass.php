<?php $this->layout("components/theme") ?>
 
<div class="d-flex flex-column justify-content-center align-items-center" style="min-height: 80vh;">
    <h3 class="mb-4">Altere a sua senha</h3>
    <h5>Insira seu e-mail para alterar a senha</h5>
    <form action="<?= $router->route("auth.resetpass") ?>" method="POST">
        <div class="mb-3" style="width: 400px;">
            <input type="email" class="form-control form-control-lg" name="email">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-light fw-bold">Enviar</button>
        </div>
    </form>

</div>
<div>
    <a href="<?= $router->route("web.home") ?>" class="text-light btn"><i class="bi bi-arrow-left"></i> Voltar ao Login</a>
</div>
