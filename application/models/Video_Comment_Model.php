<?php

class Video_Comment_Model extends CI_Model{
  function __construct(){
    parent::__construct();
  }

  function submitComment($videoId,$comment){
    $data = array(
      'video_id' => $videoId,
      'commenter_id'=>$this->session->userdata('login')['id'],
      'comment'=>$comment
    );
    $this->db->insert('video_comment', $data);
    if ($this->db->affected_rows() > 0) {
        return true;
    } else {
        return false;
    }
  }

  function getComment($videoId){
    $query = $this->db->get_where('vw_comment',array('video_id'=>$videoId));
    if ($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }

}

?>
