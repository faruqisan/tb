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
    $query = $this->db->get_where('chat',array('sender_id' => $userId,'receiver_id'=>$receiverId));
    if ($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }
}

?>
