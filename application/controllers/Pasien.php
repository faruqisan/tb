<?php
date_default_timezone_set('Asia/Jakarta');
class Pasien extends CI_Controller{
  function __construct(){
    parent::__construct();
  }
  public function index(){
    $this->load->view('Pasien/index.php');
  }
  public function submitVideo(){
    $date= date('Y-m-d h:i:s', time());
    $uploaderId = $this->session->userdata('login')['id'];
    $uploaderEmail = $this->session->userdata('login')['email'];
    $path = "./video/".$uploaderEmail."/";
    $config['upload_path']= $path;
    if (!is_dir($path)) {
      mkdir($path, 0777,true);
    }else{
      $config['allowed_types'] = 'mp4';
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload("video")) {
         $error = array('error' => $this->upload->display_errors());
         print_r($error);
         echo $path;
      }else {
         //state jika berhasil
         echo "succes";
      }
    }


  }
}
?>
