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
  function createUserInformation($idUser,$firstName,$lastName,$dob,$address,$phone){
    $data = array(
      'id_user'=> $idUser,
      'firstname'=> $firstName,
      'lastname'=>$lastName,
      'dob'=>$dob,
      'address'=>$address,
      'phone'=>$phone
    );
    $this->db->insert('user_information',$data);
    if ($this->db->affected_rows() > 0) {
        return true;
    } else {
        return false;
    }
  }
}

?>
