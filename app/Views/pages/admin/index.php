<?php $this->layout("components/theme") ?>

<div class="container">
    <h2>Página administrativa</h2>

    <div class="mt-5 row">
        <div class="col-4">
            <h4>Sistemas:</h4>
            <div class="d-flex gap-2">
                <select id="systems" class="form-select">
                    <?php foreach($systems as $system): ?>
                        <option><?= $system->title ?></option>
                    <?php endforeach; ?>
                </select>
                <button class="btn btn-light fw-bold" data-bs-toggle="modal" data-bs-target="#newsystem-modal"><i class="bi bi-plus-square-fill"></i></button>
            </div>

        </div>

        <div class="col-4">
            <h4>Situações:</h4>
            <div class="d-flex gap-2">
                <select id="systems" class="form-select">
                    <?php foreach($situations as $situation): ?>
                        <option><?= $situation->title ?></option>
                    <?php endforeach; ?>
                </select>
                <button class="btn btn-light fw-bold" data-bs-toggle="modal" data-bs-target="#newsituation-modal"><i class="bi bi-plus-square-fill"></i></button>
            </div>
        </div>

        <?php if($_SESSION['userType'] === "admin"): ?>
            <div class="col-4">
                <h4>Usuários:</h4>
                <div class="d-flex gap-2">
                    <select id="systems" class="form-select">
                        <?php foreach($users as $user): ?>
                            <option><?= $user->first_name ?> <?= $user->last_name ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button class="btn btn-light fw-bold" data-bs-toggle="modal" data-bs-target="#newuser-modal"><i class="bi bi-plus-square-fill"></i></button>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php $this->insert("components/new-system") ?>
<?php $this->insert("components/new-situation") ?>
<?php $this->insert("components/new-user") ?>
