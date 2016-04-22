<?php

class Video_Model extends CI_Model{
  function __construct(){
    parent::__construct();
  }
  function insertVideo($data){
    $this->db->insert('video', $data);
    if ($this->db->affected_rows() > 0) {
        return true;
    } else {
        return false;
    }
  }
  function getAllVideoById($userId){
    $query = $this->db->order_by('upload_time', 'DESC')->get_where('video', array('id_user' => $userId));
    if ($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }

  function getAllUnApprovedVideo(){
    $query = $this->db->get('vw_new_video');
    if ($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }

  function getAllAcceptedVideo(){
    $query = $this->db->get('vw_acc_video');
    if ($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }

  function getAllDeclinedVideo(){
    $query = $this->db->get('vw_dec_video');
    if ($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }

  function countVideoUploadedToday(){
    $today = date('Y-m-d h:i:s', time());
    $query = $this->db->get_where('video', array('upload_time' => $today));
    return $query->num_rows();
  }

  function countTotalVideo(){
    $query = $this->db->get('video');
    return $query->num_rows();
  }

  function countTotalVideoAcc(){
    $query = $this->db->get('vw_acc_video');
    return $query->num_rows();
  }

  function countTotalVideoDec(){
    $query = $this->db->get('vw_dec_video');
    return $query->num_rows();
  }

  function declineVideo($video_id,$keterangan){
    $data = array(
                   'approved_status' => 'DECLINED',
                   'keterangan'=>$keterangan,
                   'approver_id'=>$this->session->userdata('login')['id']
                );
    $this->db->where('id', $video_id);
    $this->db->update('video', $data);
    if ($this->db->affected_rows() > 0) {
        return true;
    } else {
        return false;
    }
  }

  function acceptVideo($video_id,$keterangan){
    $data = array(
                   'approved_status' => 'ACCEPTED',
                   'keterangan'=>$keterangan,
                   'approver_id'=>$this->session->userdata('login')['id']
                );
    $this->db->where('id', $video_id);
    $this->db->update('video', $data);
    if ($this->db->affected_rows() > 0) {
        return true;
    } else {
        return false;
    }
  }

}

?>
