<!-- Button trigger modal -->
<button type="button" class="btn btn-lg bg-trasparent text-white" data-bs-toggle="modal" data-bs-target="#modal">
    <i class="bi bi-list"></i>
</button>

<!-- Modal -->
<div class="modal fade text-dark" id="modal" data-bs-keyboard="false" aria-labelledby="modal" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen" style="width: 200px;">
    <div class="modal-content">
      <div class="modal-header" style="border: none;">
        <h5 class="modal-title" id="staticBackdropLabel">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex flex-column justify-content-between">
        <ul class="navbar-nav">
          <li class="nav-item"><a href="<?= $router->route("app.index") ?>" class="nav-link text-dark fw-bold"><i class="bi bi-bookmark-plus-fill"></i> Atendimentos</a></li>
          <li class="nav-item"><a href="<?= $router->route("app.me") ?>" class="nav-link text-dark fw-bold"><i class="bi bi-person-circle"></i> Perfil</a></li>
          <?php if($_SESSION['userType']  === "admin"): ?>
            <li class="nav-item"><a href="<?= $router->route("admin.index") ?>" class="nav-link text-dark fw-bold"><i class="bi bi-gear-fill"></i> Adminstrativo</a></li>            
          <?php endif; ?>
        </ul>
        <a href="<?= $router->route("app.logout") ?>" class="nav-link text-dark fw-bold"><i class="bi bi-door-open-fill"></i> Sair</a>
      </div>
    </div>
  </div>
</div>
