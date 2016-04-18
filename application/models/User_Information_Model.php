<?php

class User_Information_Model extends CI_Model{
  function __construct(){
    parent::__construct();
  }
  function getUserInformation($userId){
    $query = $this->db->get_where('user_information', array('id_user' => $userId), 1);
    if ($query->num_rows() == 1) {
        return $query->result();
    } else {
        return false;
    }
  }
}

?>
