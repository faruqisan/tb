<?php

class Login extends CI_Controller{

  function __construct(){
    parent::__construct();
    $this->load->model('User_Model');
  }

  public function index(){
    if($this->session->userdata('login')!=null){
      redirect('Welcome');
    }else{
      $this->load->view('Login/index.php');
    }
  }

  public function doLogin(){
    $inputtedEmail = $this->input->post('email');
    $inputtedPassword = $this->input->post('password');
    $loginResult = $this->User_Model->userLogin($inputtedEmail,$inputtedPassword);
    if($loginResult!=false){
      $userPrivilage = $loginResult[0]->id_privilage;
      switch($userPrivilage){
        case '1':
        #User
        $sessionData = array(
  				'id'=>$loginResult[0]->id,
  				'email'=>$loginResult[0]->id_user,
  				'loginTime' => date('Y-m-d h:i:s', time())
  			);
        $this->session->set_userdata('login',$sessionData);
        redirect('Welcome');
        break;
        case '2':
        #Admin
        break;
        default:
        break;
      }
    }
  }

}

?>
