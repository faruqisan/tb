<?php

class Pasien_Model extends CI_Model{
  function __construct(){
    parent::__construct();
  }
  function getPasienList(){
    $query = $this->db->get('vw_pasien');
    return $query->result();
  }
  function countTotalPasien(){
    $query = $this->db->get('vw_pasien');
    return $query->num_rows();
  }

  function getPasienById($id){
    $query = $this->db->get_where('vw_pasien',array('id'=>$id));
    return $query->result();
  }

}

?>
