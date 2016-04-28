<?php

class Chat_Model extends CI_Model{
  function __construct(){
    parent::__construct();
  }
  function insertChat($senderId,$receiverId,$chat){
    $data = array(
      'sender_id'=>$senderId,
      'receiver_id'=>$receiverId,
      'chat'=>$chat
    );
    $this->db->insert('chat', $data);
    if ($this->db->affected_rows() > 0) {
        return true;
    } else {
        return false;
    }
  }
  function getChat($userId,$receiverId){
    $this->db->where('sender_id =', $userId);
    $this->db->or_where('sender_id =', $receiverId);
    $query = $this->db->get('chat');
    //$query = "SELECT * FROM `chat` WHERE `sender_id` = '$userId' OR `sender_id` ='$receiverId'";
    if ($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }
}

?>
