<?php
date_default_timezone_set('Asia/Jakarta');
class Pasien extends CI_Controller{
  function __construct(){
    parent::__construct();
    if($this->session->userdata('login')['privilage'] != "Pasien" ){
      redirect('Login');
		}
    $this->load->Model('Video_Model');
  }
  public function index(){
    $this->load->view('Pasien/index.php');
  }
  public function profile(){
    $data['listUserVideo'] = $this->Video_Model->getAllVideoById($this->session->userdata('login')['id']);
    $this->load->view('Pasien/profile.php',$data);
  }
  public function submitVideo(){
    $date= date('Y-m-d h:i:s', time());
    $uploaderId = $this->session->userdata('login')['id'];
    $uploaderEmail = $this->session->userdata('login')['email'];
    $path = "./video/".$uploaderEmail."/";
    $config['upload_path']= $path;
    $config['allowed_types'] = 'mp4';
    if (!is_dir($path)) {
      mkdir($path, 0777,true);
    }else{
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload("video")) {
        $this->session->set_flashdata('uploadResult','Video gagal di Upload');
        redirect('Pasien');
      }else {
         //state jika berhasil
         $upload_data = $this->upload->data();
         $fileName = $upload_data['file_name'];
         $data = array(
           'id_user'=>$uploaderId,
           'video_link'=>'video/'.$uploaderEmail.'/'.$fileName,
           'upload_time'=>date('Y-m-d h:i:s', time())
         );
         $save = $this->Video_Model->insertVideo($data);
         if($save != false){
           $this->session->set_flashdata('uploadResult','Video Berhasil Di Upload');
           redirect('Pasien/profile');
         }else{
           redirect('Pasien');
         }
      }
    }
  }
  public function deleteVideo(){
    $idVideo = $this->input->post('id');
		$result = $this->Video_Model->deleteVideo($idVideo);
    $response = array('status'=>$result);
		header("Content-Type: application/json");
		echo json_encode($response);
  }
}
?>
