<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Todos os cursos</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <a href="<?= base_url('')?>cursos/formCursos" class="btn btn-sm btn-success">
          <i class="fas fa-plus-square"></i>
          Adicionar Curso
        </a>
      </div>
    </div>
  </div>

  <div class="container">
    <?php foreach($cursos as $curso) : ?>
      <div class="card">
        <div class="card-header">
          <h2><?= $curso['titulo'] ?></h2>
          <a href="<?= base_url('') ?>cursos/edit/<?= $curso['id']?>">
            <button class="btn btn-sm btn-warning">Editar</button>
          </a>
          <a href="<?= base_url('') ?>cursos/delete/<?= $curso['id']?>">
            <button class="btn btn-sm btn-danger">Deletar</button>
          </a>
        </div>
        <div class="card-body">
          <img
            class="img-fluid rounded mx-auto d-block"
            src="<?= base_url('')?>assets/images/<?=$curso['img_principal']?>"
            width="450"
            height="450"
          />
          <p>
            <?= $curso['descricao'] ?>
          </p>

          <hr>
          <h3>Galeria</h3>

          <?php for($i = 0; $i < count($curso['name_image']); $i++ ) : ?>
            
            <img
              class="rounded"
              src="<?= base_url('')?>assets/images/<?=$curso['name_image'][$i]?>"
              width="150"
              height="150"
            />
          
          <?php endfor; ?>

        </div>
        <div class="footer">
           
        </div>
      </div>
      <br>
    <?php endforeach; ?>
  </div>
</main>
