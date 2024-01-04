<!-- Button trigger modal -->
<button type="button" class="btn btn-lg bg-trasparent text-white fixed-top text-start" style="width: 50px;" data-bs-toggle="modal" data-bs-target="#modal">
    <i class="bi bi-list"></i>
</button>

<!-- Modal -->
<div class="modal fade text-dark" id="modal" data-bs-keyboard="false" aria-labelledby="modal" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen" style="width: 200px;">
    <div class="modal-content">
      <div class="modal-header" style="border: none;">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex flex-column justify-content-between">
        <ul class="navbar-nav">
          <?php if(isset($_SESSION['userId'])): ?>
            <li class="nav-item"><a href="<?= $router->route("app.index") ?>" class="nav-link text-dark fw-bold"><i class="bi bi-bookmark-plus-fill"></i> Atendimentos</a></li>
            <li class="nav-item"><a href="<?= $router->route("app.me") ?>" class="nav-link text-dark fw-bold"><i class="bi bi-person-circle"></i> Perfil</a></li>
            <?php if($_SESSION['userType']  != "guest"): ?>
              <li class="nav-item"><a href="<?= $router->route("app.tips") ?>" class="nav-link text-dark fw-bold"><i class="bi bi-info-circle-fill"></i> Dicas</a></li>            
            <?php endif; ?>
            <?php if($_SESSION['userType']  === "admin"): ?>
              <li class="nav-item"><a href="<?= $router->route("admin.index") ?>" class="nav-link text-dark fw-bold"><i class="bi bi-gear-fill"></i> Adminstrativo</a></li>            
            <?php endif; ?>
            
          <?php endif; ?>
        </ul>
        <ul class="navbar-nav">
          <?php if(!isset($_SESSION['userId'])): ?>
            <li class="nav-item"><a href="<?= $router->route("web.home") ?>" class="nav-link text-dark fw-bold"><i class="bi bi-person-circle"></i> Login</a></li>
            <?php endif; ?>
            <li class="nav-item"><a href="https://atendimentos-frontend.vercel.app/" class="nav-link text-dark fw-bold" target="__blank"><i class="fa-brands fa-vuejs"></i> Versão em Vue 3</a></li>
          <li class="nav-item"><a href="<?= $router->route("blog.home") ?>" class="nav-link text-dark fw-bold"><i class="bi bi-newspaper"></i> Novidades</a></li>
          <li class="nav-item"><a href="https://github.com/Rodrigotutz/atendimentos_backend" target="_blank" class="nav-link text-dark fw-bold"><i class="bi bi-github"></i> Github</a></li>
          <?php if(isset($_SESSION['userId'])): ?>
            <a href="<?= $router->route("auth.logout") ?>" class="nav-link text-dark fw-bold"><i class="bi bi-door-open-fill"></i> Sair</a>
          <?php endif; ?>
        </ul>
        
      </div>
    </div>
  </div>
</div>
