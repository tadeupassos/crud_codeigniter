<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> Editar curso</h1>
      </div>

			<div class="col-md-12">
					
					<form action="<?= base_url('')?>cursos/update/<?= $cursos['id'] ?>" method="post" enctype="multipart/form-data">
					
					<div class="col-md-6">
						<div class="form-group">
							<label for="titulo">Nome do curso</label>
							<input
                type="text" 
                class="form-control"
                name="titulo"
                id="titulo"
                placeholder="Título"
                value="<?= $cursos['titulo']?>"
              >
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label for="descricao">Descrição do curso</label>
							<textarea
                name="descricao"
                id="descricao"
                rows="5"
                class="form-control"
                required
              ><?= $cursos['descricao']?></textarea>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label for="img-principal">Imagem principal do curso</label>
							<img
                class="img-fluid rounded mx-auto d-block"
                src="<?= base_url('')?>assets/images/<?=$cursos['img_principal']?>"
                width="450"
                height="450"
              />
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label for="img-galeria">Trocar imagem PRINCIPAL</label>
							<input
                class="form-control"
                type="file"
                name="img-principal"
              >
						</div>
					</div>
          
            <h3>Galeria</h3>
            <input type="hidden" name="string_name_imgs" value="<?= $cursos['img_galeria']?>"/> 

            <div class="col-md-6">
              <div class="form-group">
                <label for="img-galeria">Adicionar mais imagens à galeria</label>
                <input
                  class="form-control"
                  type="file"
                  name="img-galeria[]"
                  multiple="multiple"
                >
              </div>
					  </div>

            <div class="col-md-6">
            <label for="img-galeria">Remover imagens da galeria</label>
            <?php for($i = 0; $i < count($cursos['name_image']); $i++ ) : ?>
              
              <div class="col-md-6">
                <img
                  class="rounded"
                  src="<?= base_url('')?>assets/images/<?=$cursos['name_image'][$i]?>"
                  width="150"
                  height="150"
                />
                <button class="btn btn-outline-danger btn-sm">X</button>
              </div>
              <br>

            <?php endfor; ?>
          </div>

					<div class="col-md-6">
							<button type="submit" class="btn btn-success btn-xs">
                <i class="fas fa-check"></i>
                Salvar
              </button>
							<a href="<?= base_url('')?>cursos" class="btn btn-danger btn-xs">
                <i class="fas fa-times"></i> 
                Cancelar
              </a>
						</div>
					</div>
				</form>
			</div>

    </main>
  </div>
</div>
