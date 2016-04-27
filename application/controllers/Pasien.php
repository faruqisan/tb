<?php
date_default_timezone_set('Asia/Jakarta');
class Pasien extends CI_Controller{
  function __construct(){
    parent::__construct();
    if($this->session->userdata('login')['privilage'] != "Pasien" ){
      redirect('Login');
		}
    $this->load->Model('Video_Model');
    $this->load->Model('Video_Comment_Model');
    $this->load->Model('Dokter_Model');
    $this->load->Model('Chat_Model');
  }
  public function index(){
    $data['userAccVideo'] = $this->Video_Model->countTotalVideoAccById($this->session->userdata('login')['id']);
    $data['userDecVideo'] = $this->Video_Model->countTotalVideoDecById($this->session->userdata('login')['id']);
    $data['userVideo'] = $this->Video_Model->countTotalVideoById($this->session->userdata('login')['id']);
    $data['anotherUserVideo'] = $this->Video_Model->getAllAcceptedVideo();

    $data['listDokter'] = $this->Dokter_Model->getDokterList();
    $this->load->view('Pasien/index.php',$data);
  }
  public function profile(){
    $data['listUserVideo'] = $this->Video_Model->getAllVideoById($this->session->userdata('login')['id']);
    $data['listDokter'] = $this->Dokter_Model->getDokterList();
    $this->load->view('Pasien/profile.php',$data);
  }
  public function chat($idDokter){
    $data['chat'] = $this->Chat_Model->getChat($this->session->userdata('login')['id'],$idDokter);
    $this->load->view('Pasien/Chat.php',$data);
  }
  public function submitVideo(){
    $date= date('Y-m-d H:i:s', time());
    $uploaderId = $this->session->userdata('login')['id'];
    $uploaderEmail = $this->session->userdata('login')['email'];
    $path = "./video/".$uploaderEmail."/";
    $config['upload_path']= $path;
    $config['allowed_types'] = 'mp4|mov|flv';
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

  public function submitComment(){
    $idVideo = $this->input->post('id');
    $comment = $this->input->post('comment');
		$result = $this->Video_Comment_Model->submitComment($idVideo,$comment);
    $response = array('status'=>$result);
		header("Content-Type: application/json");
		echo json_encode($response);
  }

  public function getComment($videoId){
    $comment = $this->Video_Comment_Model->getComment($videoId);
    header("Content-Type: application/json");
		echo json_encode($comment);
  }

}
?>
