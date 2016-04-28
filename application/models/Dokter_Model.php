<?php
class Dokter_Model extends CI_Model{
  function __construct(){
    parent::__construct();
  }
  function getDokterList(){
    $query = $this->db->get('vw_dokter');
    return $query->result();
  }
  function getDokterById($id){
    $query = $this->db->get_where('vw_dokter',array('id'=>$id));
    return $query->result();
  }
  function countTotalDokter(){
    $query = $this->db->get('vw_dokter');
    return $query->num_rows();
  }
}
?>
