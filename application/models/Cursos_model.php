<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Cursos_model extends CI_Model {
  public function index () {
    return $this->db->get('cursos')->result_array();
  }

  public function create ($curso) {
    return $this->db->insert('cursos', $curso);
  }

  public function show ($id) {
    return $this->db->get_where('cursos', array(
      "id" => $id
    ))->row_array();
  }

  public function update ($id, $curso) {
    $this->db->where('id', $id);
    return $this->db->update('cursos', $curso);
  }

  public function delete ($id) {
    $this->db->where('id', $id);
    return $this->db->delete('cursos');
  }
}