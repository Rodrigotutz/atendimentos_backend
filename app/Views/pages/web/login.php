<?php $this->layout("components/theme") ?>

<div class="login-container">
    <form class="login-form bg-white text-dark p-4 border rounded-3  shadow-lg" action="<?= $router->route("auth.login") ?>" method="POST">
        <h2 class="text-center">Entrar</h2>

        <div class="mt-3">
            <input name="email" type="email" class="form-control" placeholder="Insira seu e-mail">
        </div>
        <div class="mt-3">
            <input name="passwd" type="password" class="form-control pass" placeholder="Insira sua senha">
        </div>
        <div class="mt-1 form-check small">
            <input type="checkbox" class="form-check-input" id="btnPassLogin">
            <label class="form-check-label text-muted" for="btnPassLogin">Ver Senha</label>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-dark">Entrar</button>
        </div> 
        
        <div class="small mt-3">
            <small>Esqueceu a senha? <a href="<?= $router->route("web.alterpass") ?>">Alterar senha</a></small>
        </div>
    </form>
    <div class="mt-5">
        <small>Não tem uma conta? <a href="" class="text-light" data-bs-toggle="modal" data-bs-target="#login-modal">Crie aqui!</a></small>
        <?php $this->insert("components/register-modal") ?>
    </div>
</div>

<?php $this->start("scripts") ?>

  <script src="<?= asset("js/showPass.js") ?>"></script>

<?php $this->stop() ?>
