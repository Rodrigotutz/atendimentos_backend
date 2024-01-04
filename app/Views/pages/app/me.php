<?php $this->layout("components/theme") ?>

<section class="text-dark">
    <div class="container py-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col col-lg-6 mb-4 mb-lg-0">
                <div class="card mb-3" style="border-radius: .5rem;">
                    <div class="row g-0">
                        <div class="col-md-4 gradient-custom text-center text-dark">
                            <img src="<?= asset("images/user/perfil.png") ?>" alt="Avatar" class="img-fluid mt-5 mb-3" style="width: 80px;" />
                            <h5><?= $user->first_name ?> <?= $user->last_name ?></h5>
                        </div>
                        <div class="col-md-8">

                            <div class="card-body p-4">
                                <h4>Informações</h4>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                <div class="col-12 mb-3">
                                    <h6>Email</h6>
                                    <p class="text-muted"><?= $user->email ?></p>
                                </div>
                                </div>

                                <div class="row pt-1">
                                <div class="col-6 mb-3">
                                    <h6>Tipo</h6>
                                    <?php if($user->type === "admin"): ?>
                                        <p class="text-muted">Administrador</p>
                                    <?php elseif($user->type === "user"): ?>
                                        <p class="text-muted">Suporte</p>
                                    <?php else: ?>
                                        <p class="text-muted">Usuário</p>
                                    <?php endif; ?>

                                </div>
                                <div class="col-6 mb-3">
                                    <h6>Criado em:</h6>
                                    <p class="text-muted"><?=(new DateTime($user->created_at))->format("d/m/Y")  ?></p>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mb-3">
                            <button data-bs-toggle="modal" data-bs-target="#pass-modal" class="btn btn-primary">Alterar Senha</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php $this->insert("components/alter_pass") ?>
<?php $this->start("scripts") ?>

  <script src="<?= asset("js/showPass.js") ?>"></script>

<?php $this->stop() ?>
