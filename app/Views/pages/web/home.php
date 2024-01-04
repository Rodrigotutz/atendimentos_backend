<?php $this->layout("components/theme") ?>

<div class="container login-form">
    <form class="bg-white text-dark p-4 border rounded-3  shadow-lg" action="<?= $router->route("web.login") ?>" method="POST">
        <h2 class="text-center">Entrar</h2>
        <div class="text-center">
            <small class="text-<?= $class ?>"><?= $message ?></small>
        </div>

        <div class="mt-3">
            <input name="email" type="email" class="form-control" placeholder="Insira seu e-mail">
        </div>
        <div class="mt-3">
            <input name="passwd" type="password" class="form-control" placeholder="Insira sua senha">
        </div>
        <!--
        <div class="mt-3 form-check small">
            <input type="checkbox" class="form-check-input" id="showPass">
            <label class="form-check-label text-muted" for="showPass">Ver Senha</label>
        </div>
        -->
        <div class="mt-3 text-center">
            <button type="submit" class="btn btn-dark">Enviar</button>
        </div>  
    </form>
</div>