<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class LoginVerify extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
 }
 
 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');
 
   $this->form_validation->set_rules('code', 'code', 'trim|required');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
  
   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
     $this->load->view('user/header_login');
     $this->load->view('user/login');
     $this->load->view('user/footer_login');
   }
   else{
    $code = $this->input->post('code');
    $hak_akses= $this->user->cekHakAkses($code);

    if ($hak_akses == 1 ){
     redirect('UserPage/index', 'refresh');
    }
   else 
    {
      redirect('UserPage/index', 'refresh');
    }
  }
 }
 
 function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $code = $this->input->post('code');
 
   //query the database
   $result = $this->user->login($code, $password);
 
   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
      if($row->hak_akses==1){
            $sess_array = array(
             'code' => $row->code,
             'email' => $row->email,
             'hak_akses' => $row->hak_akses,
             'name' => $row->name,
             'image' => $row->image,
             'logged_in' => TRUE
          );
          }
          else{
            $sess_array = array(
             'code' => $row->code,
             'email' => $row->email,
             'hak_akses' => $row->hak_akses,
             'name' => $row->name,
             'image' => $row->image,
             'distributor_code' => $row->distributor_code,
             'distributor_name' => $row->distributor_name,
             'user_login' => TRUE
          );
          }
       
       
       $this->session->set_userdata($sess_array);

     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid user code or password');
     return false;
   }
 }
}
?>