<?php
class Dokter_Model extends CI_Model{
  function __construct(){
    parent::__construct();
  }
  function getDokterList(){
    $query = $this->db->get('vw_dokter');
    return $query->result();
  }
  function countTotalDokter(){
    $query = $this->db->get('vw_dokter');
    return $query->num_rows();
  }
}
?>
