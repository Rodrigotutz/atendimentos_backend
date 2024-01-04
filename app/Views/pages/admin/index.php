<?php $this->layout("components/theme") ?>

<div class="container">
    <h2>Página administrativa</h2>

    <div class="mt-5 row">

        <?php if($_SESSION['userType'] === "admin"): ?>     
            <div class="col-12 col-md-4">
                <h4>Usuários:</h4>
                <div class="d-flex gap-2">
                    <select id="users" class="form-select text-dark" onchange="userSelected()">
                        <option selected>--- Selecione o usuário ---</option>
                        <?php foreach($users as $user): ?>
                            <option value="<?= $user->id ?>"><?= $user->first_name ?> <?= $user->last_name ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button id="userModal" class="d-none btn btn-light fw-bold" data-bs-toggle="modal" data-bs-target="#edituser-modal"><i class="bi bi-pen-fill"></i></button>
                    <button class="btn btn-light fw-bold" data-bs-toggle="modal" data-bs-target="#newuser-modal"><i class="bi bi-plus-square-fill"></i></button>
                </div>
            </div>
        <?php endif; ?>
        
        <div class="col-12 col-md-4 mt-5 mt-md-0">
            <h4>Sistemas:</h4>
            <div class="d-flex gap-2">
                <select id="systems" class="form-select" onchange="systemSelected()">
                    <option selected>-- Selecione um Sistema ---</option>
                    <?php foreach($systems as $system): ?>
                        <option value="<?= $system->id ?>"><?= $system->title ?></option>
                    <?php endforeach; ?>
                </select>
                <button id="systemModal" class="d-none btn btn-light fw-bold" data-bs-toggle="modal" data-bs-target="#editsistem-modal"><i class="bi bi-pen-fill"></i></button>
                <button class="btn btn-light fw-bold" data-bs-toggle="modal" data-bs-target="#newsystem-modal"><i class="bi bi-plus-square-fill"></i></button>
            </div>

        </div>

        <div class="col-12 col-md-4 mt-5 mt-md-0">
            <h4>Situações:</h4>
            <div class="d-flex gap-2">
                <select id="situations" class="form-select" onchange="situationSelected()">
                    <option selected>--- Selecione a Situação ---</option>
                    <?php foreach($situations as $situation): ?>
                        <option value="<?= $situation->id ?>"><?= $situation->title ?></option>
                    <?php endforeach; ?>
                </select>
                <button class="d-none btn btn-light fw-bold" id="situationModal" data-bs-toggle="modal" data-bs-target="#editsituation-modal"><i class="bi bi-pen-fill"></i></button>
                <button class="btn btn-light fw-bold" data-bs-toggle="modal" data-bs-target="#newsituation-modal"><i class="bi bi-plus-square-fill"></i></button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<?php $this->insert("components/new-user") ?>
<?php $this->insert("components/edit-user") ?>

<?php $this->insert("components/new-system") ?>
<?php $this->insert("components/edit-system") ?>

<?php $this->insert("components/new-situation") ?>
<?php $this->insert("components/edit-situation") ?>