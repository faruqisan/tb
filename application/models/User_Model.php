<?php

class User_Model extends CI_Model{

  function __construct(){
    parent::__construct();
  }

  function userLogin($email,$password){
    $query = $this->db->get_where('user', array('email' => $email,'password' =>md5($password)),1);
    if ($query->num_rows() == 1) {
        return $query->result();
    } else {
        return false;
    }
  }

  function getAllUser(){
    $this->db->select('id,email,id_privilage');
    $query = $this->db->get('user');
    return $query->result();
  }

  function getUserById($id){
    $query = $this->db->get_where('user',array('id'=>$id),1);
    if ($query->num_rows() == 1) {
      return $query->result();
    } else {
      return false;
    }
  }

  function createUser($email,$password,$privilage){
    $data = array(
      'email'=> $email,
      'password'=> md5($password),
      'id_privilage'=>$privilage
    );
    $this->db->insert('user',$data);
    if ($this->db->affected_rows() > 0) {
        return true;
    } else {
        return false;
    }
  }

  function updateUser(){

  }

  function deleteUser(){

  }

  function getLatestIdForUser(){
    $sql = "SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'tb' AND TABLE_NAME = 'user'";
    $query = $this->db->query($sql);
    return $query->result();
  }


}

?>
