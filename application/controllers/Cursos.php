<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cursos extends CI_Controller {

  public function index() {
    $this->load->model('cursos_model');

    $data['title'] = 'CRUD Cursos';
    $data['cursos'] = $this->cursos_model->index();

    for($i = 0; $i < count($data['cursos']); $i++) {
      $data['cursos'][$i]['name_image'] = '';
      $data['cursos'][$i]['name_image'] = explode(',', $data['cursos'][$i]['img_galeria']);
    }

    // print_r($data);
    // exit();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/nav', $data);
    $this->load->view('pages/cursos', $data);
    $this->load->view('templates/footer', $data);
    $this->load->view('templates/js', $data);
  }
  
  public function formCursos() {
    $this->load->model('cursos_model');

    $data['title'] = 'CRUD Cursos'; 

    $this->load->view('templates/header', $data);
    $this->load->view('templates/nav', $data);
    $this->load->view('pages/form_cursos', $data);
    $this->load->view('templates/footer', $data);
    $this->load->view('templates/js', $data);
  }

  public function create () {
    $dados = $_POST;
    $data_agora = (string) time();
    $dados['img_principal'] = $data_agora . '_' . $_FILES['img-principal']['name'];
    $_FILES['img-principal']['name'] = $dados['img_principal'];

    $configuracao = array(
      'upload_path' => './assets/images',
      'allowed_types' => 'gif|jpg|jpeg|png',
      'max-size' => 100,
      'max_width' => 1024,
      'max_height' => 768
    );
    $this->load->library('upload', $configuracao);

    
    $imgCount = count($_FILES["img-galeria"]["name"]);
    $string_imgs = '';

    for ($i = 0; $i < $imgCount; $i++) {
      $string_imgs .= $data_agora . '_' . $_FILES["img-galeria"]["name"][$i] . ',';

      $_FILES['image']['name'] = $data_agora . '_' . $_FILES['img-galeria']['name'][$i];
      $_FILES['image']['type'] = $_FILES['img-galeria']['type'][$i];
      $_FILES['image']['tmp_name'] = $_FILES['img-galeria']['tmp_name'][$i];
      $_FILES['image']['error'] = $_FILES['img-galeria']['error'][$i];
      $_FILES['image']['size'] = $_FILES['img-galeria']['size'][$i];
      
      if ($this->upload->do_upload('image')) {
        echo 'Arquivo salvo com sucesso.';
      } else {
        echo $this->upload->display_errors();
      }
    }

    $dados['img_galeria'] = rtrim($string_imgs, ',');
    
    if ($this->upload->do_upload('img-principal')) {
      echo 'Imagem principal salva';
    } else {
      echo $this->upload->display_errors();
    }

    $this->load->model('cursos_model');
    $this->cursos_model->create($dados);
    redirect('cursos');
  }

  public function edit ($id) {
    $this->load->model('cursos_model');
    $data['title'] = 'CRUD Cursos';
    $data['cursos'] = $this->cursos_model->show($id);
    $data['cursos']['name_image'] = explode(',', $data['cursos']['img_galeria']);

    $this->load->view('templates/header', $data);
    $this->load->view('templates/nav', $data);
    $this->load->view('pages/form_cursos_edit', $data);
    $this->load->view('templates/footer', $data);
    $this->load->view('templates/js', $data);
  }

  public function update ($id) {
    $configuracao = array(
      'upload_path' => './assets/images',
      'allowed_types' => 'gif|jpg|jpeg|png',
      'max-size' => 100,
      'max_width' => 1640,
      'max_height' => 968
    );
    $this->load->library('upload', $configuracao);
    
    $dados = $_POST;
    $string_name_imgs = $dados['string_name_imgs'] . ',';

    unset($dados['string_name_imgs']);
    $dados['img_galeria'] = $string_name_imgs;
    
    if($_FILES['img-principal']['name'] != '') {
      $data_agora = (string) time();
      $dados['img_principal'] = $data_agora . '_' . $_FILES['img-principal']['name'];
      $_FILES['img-principal']['name'] = $dados['img_principal'];

      if ($this->upload->do_upload('img-principal')) {
        echo 'Imagem principal salva';
      } else {
        echo $this->upload->display_errors();
      }
    }

    if ($_FILES['img-galeria']['name'][0] != '') {  #
      
      $imgCount = count($_FILES["img-galeria"]["name"]);
      $string_imgs = '';
      
      for ($i = 0; $i < $imgCount; $i++) {
        $data_agora = (string) time();
        $string_imgs .= $data_agora . '_' . $_FILES["img-galeria"]["name"][$i] . ',';

        $_FILES['image']['name'] = $data_agora . '_' . $_FILES['img-galeria']['name'][$i];
        $_FILES['image']['type'] = $_FILES['img-galeria']['type'][$i];
        $_FILES['image']['tmp_name'] = $_FILES['img-galeria']['tmp_name'][$i];
        $_FILES['image']['error'] = $_FILES['img-galeria']['error'][$i];
        $_FILES['image']['size'] = $_FILES['img-galeria']['size'][$i];
        
        if ($this->upload->do_upload('image')) {
          echo 'Arquivo salvo com sucesso.';
        } else {
          echo $this->upload->display_errors();
        }
      }

      $dados['img_galeria'] .= rtrim($string_imgs, ',');
    }

    $this->load->model('cursos_model');
    $this->cursos_model->update($id, $dados);
    redirect('cursos');
  }

  public function delete ($id) {
    $this->load->model('cursos_model');
    $this->cursos_model->delete($id);
    redirect('cursos');
  }
}