<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Cadastrar novo curso</h1>
      </div>

			<div class="col-md-12">
					
					<form action="<?= base_url('')?>cursos/create" method="post" enctype="multipart/form-data">
					
					<div class="col-md-6">
						<div class="form-group">
							<label for="titulo">Nome do curso</label>
							<input
                type="text" 
                class="form-control"
                name="titulo"
                id="titulo"
                placeholder="Título"
                required
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
              ></textarea>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label for="img-principal">Escolha a imagem principal do seu curso</label>
							<input
                type="file"
                class="form-control"
                name="img-principal"
                id="img-principal"
              >
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label for="img-galeria">Adicione quantas imagens quiser para o seu curso</label>
							<input
                class="form-control"
                type="file"
                name="img-galeria[]"
                multiple="multiple"
              >
						</div>
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
