<?php
date_default_timezone_set('Asia/Jakarta');
class Login extends CI_Controller{

  function __construct(){
    parent::__construct();
    $this->load->model('User_Model');
    $this->load->model('User_Information_Model');
  }

  public function index(){
    if($this->session->userdata('login')!=null){
      switch ($this->session->userdata('login')['privilage']) {
        case 'Pasien':
          redirect('Pasien');
          break;
        case 'Admin':
          redirect('Admin');
          break;
        default:
          # code...
          break;
      }
    }else{
      $this->load->view('Login/index.php');
    }
  }

  public function doLogin(){
    $inputtedEmail = $this->input->post('email');
    $inputtedPassword = $this->input->post('password');
    $loginResult = $this->User_Model->userLogin($inputtedEmail,$inputtedPassword);
    $userData = $this->User_Information_Model->getUserInformation($loginResult[0]->id);
    if($loginResult!=false && $userData!=false){
      $userPrivilage = $loginResult[0]->id_privilage;
      switch($userPrivilage){
        case '1':
        #User
        $sessionData = array(
          'privilage'=>'Pasien',
  				'id'=>$loginResult[0]->id,
  				'email'=>$loginResult[0]->email,
          'firstname'=>$userData[0]->firstname,
          'lastname'=>$userData[0]->lastname,
          'dob'=>$userData[0]->dob,
          'address'=>$userData[0]->address,
          'phone'=>$userData[0]->phone,
  				'loginTime' => date('Y-m-d h:i:s', time())
  			);
        $this->session->set_userdata('login',$sessionData);
        redirect('Pasien');
        break;
        case '2':
        #Admin
        $sessionData = array(
          'privilage'=>'Admin',
  				'id'=>$loginResult[0]->id,
  				'email'=>$loginResult[0]->email,
          'firstname'=>$userData[0]->firstname,
          'lastname'=>$userData[0]->lastname,
          'dob'=>$userData[0]->dob,
          'address'=>$userData[0]->address,
          'phone'=>$userData[0]->phone,
  				'loginTime' => date('Y-m-d h:i:s', time())
  			);
        $this->session->set_userdata('login',$sessionData);
        redirect('Admin');
        break;
        case '3':
        #dokter
        break;
        default:
        break;
      }
    }else{
      $this->session->set_flashdata('loginResult','Username atau Password Salah');
			redirect('/Login');
    }
  }

  public function doLogout(){
    $this->session->unset_userdata('login');
    redirect('Login');
  }

}

?>
