<?php
class Dokter extends CI_Controller{
  function __construct(){
    parent::__construct();
    if($this->session->userdata('login')['privilage'] != "Dokter" ){
      redirect('Login');
		}
    $this->load->Model('Video_Model');
    $this->load->Model('Pasien_Model');
  }
  function index(){
    $data['videoToday'] = $this->Video_Model->countVideoUploadedToday();
    $data['totalVideo'] = $this->Video_Model->countTotalVideo();
    $data['accVideo'] = $this->Video_Model->countTotalVideoAcc();
    $data['decVideo'] = $this->Video_Model->countTotalVideoDec();
    $data['newVideo'] = $this->Video_Model->countTotalVideoNew();

    $data['totalPasien'] = $this->Pasien_Model->countTotalPasien();
    $data['listPasien'] = $this->Pasien_Model->getPasienList();

    $this->load->view('Dokter/index.php',$data);
  }

  function newVideo(){
    $data['unApprovedVideo'] = $this->Video_Model->getAllUnApprovedVideo();
    $this->load->view('Dokter/NewVideo.php',$data);
  }
  function acceptedVideo(){
    $data['acceptedVideo'] = $this->Video_Model->getAllAcceptedVideo();
    $this->load->view('Dokter/AcceptedVideo.php',$data);
  }

  function declinedVideo(){
    $data['declinedVideo'] = $this->Video_Model->getAllDeclinedVideo();
    $this->load->view('Dokter/DeclinedVideo.php',$data);
  }

  function declineVideo(){
    $idVideo = $this->input->post('id');
    $keterangan = $this->input->post('keterangan');
		$result = $this->Video_Model->declineVideo($idVideo,$keterangan);

    $response = array('status'=>$result);

		header("Content-Type: application/json");
		echo json_encode($response);
  }

  function acceptVideo(){
    $idVideo = $this->input->post('id');
    $keterangan = $this->input->post('keterangan');
		$result = $this->Video_Model->acceptVideo($idVideo,$keterangan);

    $response = array('status'=>$result);

		header("Content-Type: application/json");
		echo json_encode($response);
  }
}
?>
