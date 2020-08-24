<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">CRUD Cursos</a>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Menu</span>
        </h6>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('')?>cursos">Listagem de cursos</a>
          </li>
					<li class="nav-item">
            <a class="nav-link" href="<?= base_url('')?>cursos/formCursos">Inserir novo curso</a>
          </li>
        </ul>
      </div>
    </nav>