<?php
class UserPage extends CI_Controller {
        function __construct(){
                parent::__construct();
                $this->load->model("model_user");
                $this->load->model("model_order");
                $this->load->model("model_package"); //constructor yang dipanggil ketika memanggil products.php untuk melakukan pemanggilan pada model : products_model.php yang ada di folder models
                $this->load->helper(array('form', 'url'));
        }

        public function index(){
                if($this->session->userdata('logged_in')){
                    $data = array (
                            'silver' => $this->model_package->getSilver(),
                            'bronze' => $this->model_package->getBronze(),
                            'platinum' => $this->model_package->getPlatinum(),
                            'gold' => $this->model_package->getGold(),
                            'all_order' => $this->model_order->getAll(),
                            'pending_order' => $this->model_order->getCountPendingOrder(),
                            'distributor' => $this->model_user->getCountDistributor(),
                    );
                        $email = $this->session->userdata('email');
                        $this->load->view('user/header');
                        $this->load->view('admin/index', $data);
                        $this->load->view('user/footer');
                }
                elseif($this->session->userdata('user_login'))
                {  
                    $data = array (
                            'silver' => $this->model_package->getSilver(),
                            'bronze' => $this->model_package->getBronze(),
                            'platinum' => $this->model_package->getPlatinum(),
                            'gold' => $this->model_package->getGold()
                    );
                        $email = $this->session->userdata('email');
                        $this->load->view('user/header_user');
                        $this->load->view('user/index', $data);
                        $this->load->view('user/footer');
                }
                else{
                //If no session, redirect to login page
                $this->load->view('user/header_login');
                $this->load->view('user/login');
                $this->load->view('user/footer_login');
                }
        }

        public function login(){
            if($this->session->userdata('logged_in'))
            {   
                $email = $this->session->userdata('email');
                $this->load->view('user/header');
                $this->load->view('admin/index');
                $this->load->view('user/footer');
            }
            else
            {
                //If no session, redirect to login page
                $this->load->helper(array('form'));
                $this->load->view('user/header_login');
                $this->load->view('user/login');
                $this->load->view('user/footer_login');
            }
        }

        function logout(){
                $this->session->unset_userdata('logged_in');
                session_destroy();
                redirect('UserPage/', 'refresh');
        }

        public function register(){
            if($this->session->userdata('logged_in'))
            {   
                $email = $this->session->userdata('email');
                $this->load->view('admin/invoice.html');
            }
            else
            {
                //If no session, redirect to login page
                $this->load->view('user/register.html');
            }
        }

        public function do_upload(){
                $config['upload_path'] = 'assets/ktp/';
                $config['allowed_types'] = 'jpg|png';
                $config['overwrite'] = TRUE;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload()){
                    $error = array('error' => $this->upload->display_errors());
                    echo "<script>window.alert('Format file ktp tidak sesuai')
           window.location.href='javascript:history.back()';</script>";

                }
                else{
                    $upload_data = $this->upload->data();
                    $gambar_value = $upload_data['file_name'];
        
                        
                    // selesai upload foto, berikut adalah input database
                    $this->load->library('form_validation');
                    $this->form_validation->set_rules(
                        'email', 'email', 'trim|required|valid_email|callback_isEmailExist'
                    );
                    $this->form_validation->set_rules(
                        'nik', 'nik', 'trim|required|callback_isNIKExist'
                    );

                
                if ($this->form_validation->run() == FALSE)
                {
                    // fails
                    $this->load->view('user/header');
                    $this->load->view('user/register');
                    $this->load->view('user/footer');
                }
                else
                {

                $data = array(
                                'hak_akses' => $this->input->post('hak_akses'),
                                'nik' => $this->input->post('nik'),
                                'nama' => $this->input->post('nama'),
                                'alamat' => $this->input->post('alamat'),
                                'no_tlpn' => $this->input->post('no_tlpn'),
                                'no_hp' => $this->input->post('no_hp'),
                                'email' => $this->input->post('email'),
                                'password' => md5($this->input->post('password')),
                                'ktp' => $gambar_value
                                );
                $this->model_user->addUser('t_user',$data); //passing variable $data ke products_model
                echo "<script>window.alert('Registrasi berhasil, silahkan lakukan login.')
           window.location.href='login/';</script>";//redirect page ke halaman utama controller products 
                }
            }  
        }

        public function isEmailExist($email) {
                $this->load->library('form_validation');
                $this->load->model('user');
                $is_exist = $this->user->isEmailExist($email);

                if ($is_exist) {
                    $this->form_validation->set_message(
                        'isEmailExist', '<font size="3" color=red>Email already registered.</font>'
                    );    
                    return false;
                } else {
                    return true;
                }
            }

        public function edit_profil_data(){
                $config['upload_path'] = 'assets/ktp/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['overwrite'] = TRUE;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload()){
                    $error = array('error' => $this->upload->display_errors());
                    echo "<script>window.alert('Format file ktp tidak sesuai')
           window.location.href='javascript:history.back()';</script>";
                }
                else{
                    $upload_data = $this->upload->data();
                    $gambar_value = $upload_data['file_name'];
                
                        
                // selesai upload foto, berikut adalah input database
                        
                $data = array(
                                'nik' => $this->input->post('dnik'),
                                'nama' => $this->input->post('dnama'),
                                'alamat' => $this->input->post('dalamat'),
                                'no_tlpn' => $this->input->post('dno_tlpn'),
                                'no_hp' => $this->input->post('dno_hp'),
                                'email' => $this->input->post('demail'),
                                'ktp' => $gambar_value
                                );
                $condition['id'] = $this->input->post('id');
                $this->model_user->editProfil('t_user',$data, $condition); //passing variable $data ke products_model
                
                $this->session->unset_userdata('logged_in');
                session_destroy();
                echo "<script>window.alert('Edit profil berhasil, silahkan lakukan login ulang.')
           window.location.href='login/';</script>"; //redirect page ke halaman utama controller products   
            }
        }

        public function recover(){
            //Loads the view for the recover password process.
            $this->load->view('user/header'); 
            $this->load->view('user/forgot');
            $this->load->view('user/footer');
        }

        public function recover_password(){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|callback_validate_credentials');

                    //check if email is in the database
                $this->load->model('user');
                if($this->user->email_exists()){
                    //$password is the varible to be sent to the user's email 
                    $temp_pass = md5(uniqid());
                    //send email with #password as a link
                    $this->load->library('email');
                    $config = Array(
                        'protocol' => 'smtp',
                        'smtp_host' => 'ssl://smtp.gmail.com',
                        'smtp_port' => 465,
                        'smtp_user' => 'shortproject1@gmail.com', # Change this
                        'smtp_pass' => 'short123', # Change this too
                        'mailtype'  => 'html', 
                        'charset'   => 'utf-8'
                    );
                    $this->email->initialize($config);
                    $this->email->set_newline("\r\n");
                    $this->email->clear();
                    $this->email->from('shortproject1@gmail.com');
                    $this->email->to($this->input->post('email'));
                    $this->email->subject("Reset your Password");

                    $message = "<p>This email has been sent as a request to reset our password</p>";
                    $message .= "<p><a href=".base_url()."UserPage/reset_password/".$temp_pass.">Click here </a>if you want to reset your password,
                                if not, then ignore</p>";
                    $this->email->message($message);

                    if($this->email->send()){
                        $this->load->model('user');
                        if($this->user->temp_reset_password($temp_pass)){
                            echo "check your email for instructions, thank you";
                        }
                    }
                    else{
                        echo "email was not sent, please contact your administrator";
                    }

                }else{
                    echo "your email is not in our database";
                }
        }
        public function reset_password($temp_pass){
            $this->load->model('user');
            $data['listTable'] = $this->user->getUserPass($temp_pass);
            if($this->user->is_temp_pass_valid($temp_pass)){

                $this->load->view('user/header'); 
                $this->load->view('user/reset_password', $data);
                $this->load->view('user/footer');

            }else{
                echo "the key is not valid";    
            }

        }
        public function update_password(){
            $this->load->library('form_validation');
                $this->form_validation->set_rules('password', 'Password', 'required|trim');
                $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim|matches[password]');
                    if($this->form_validation->run()){
                    $data = array(
                                'password' => md5($this->input->post('password'))
                                );
                    $condition['reset_pass'] = $this->input->post('reset_pass');
                    $this->load->model('user');
                    $this->user->editNewPass('t_user',$data, $condition); //passing variable $data ke products_model
                    echo "<script>window.alert('reset password berhasil, silahkan lakukan login.')
           window.location.href='login/';</script>";
                    }else{
                    echo "<script>window.alert('password do not match')
           window.location.href='javascript:history.back()';</script>"; 
                    }
        }

    public function cart(){
        if($this->session->userdata('user_login')){
            $data = array (
                    'cart' => $this->model_order->getCart()
            );
                $this->load->view('user/header_user');
                $this->load->view('user/cart',$data);
                $this->load->view('user/footer');
        }
        else{
        //If no session, redirect to login page
        $this->load->view('user/header_login');
        $this->load->view('user/login');
        $this->load->view('user/footer_login');
        }
    }

    //silver package
    public function silverdetail(){
        if($this->session->userdata('user_login')){
            $data = array (
                    'silver' => $this->model_package->getSilver(),
                    'silverdetail' => $this->model_package->getSilverdetail()
            );
                $this->load->view('user/header_user');
                $this->load->view('user/silver',$data);
                $this->load->view('user/footer');
        }
        else{
        //If no session, redirect to login page
        $this->load->view('user/header_login');
        $this->load->view('user/login');
        $this->load->view('user/footer_login');
        }
    }

    public function silveraddcart(){
        if($this->session->userdata('user_login'))
        { 
            $data = array(
                'user_code'=>$this->session->userdata('code'),
                'package_code'=>"PACK001",
                'status'=>"Cart",
                'qty'=>"1",
                'price'=>"2500000"
                );

            $this->db->insert('t_order',$data);
            redirect('Userpage/cart');
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    //bronze package
    public function bronzedetail(){
        if($this->session->userdata('user_login')){
            $data = array (
                    'bronze' => $this->model_package->getBronze(),
                    'bronzedetail' => $this->model_package->getBronzedetail()
            );
                $this->load->view('user/header_user');
                $this->load->view('user/bronze',$data);
                $this->load->view('user/footer');
        }
        else{
        //If no session, redirect to login page
        $this->load->view('user/header_login');
        $this->load->view('user/login');
        $this->load->view('user/footer_login');
        }
    }

    public function bronzeaddcart(){
        if($this->session->userdata('user_login'))
        { 
            $data = array(
                'user_code'=>$this->session->userdata('code'),
                'package_code'=>"PACK002",
                'status'=>"Cart",
                'qty'=>"1",
                'price'=>"3000000"
                );

            $this->db->insert('t_order',$data);
            redirect('Userpage/cart');
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    //platinum package
    public function platinumdetail(){
        if($this->session->userdata('user_login')){
            $data = array (
                    'platinum' => $this->model_package->getPlatinum(),
                    'platinumdetail' => $this->model_package->getPlatinumdetail()
            );
                $this->load->view('user/header_user');
                $this->load->view('user/platinum',$data);
                $this->load->view('user/footer');
        }
        else{
        //If no session, redirect to login page
        $this->load->view('user/header_login');
        $this->load->view('user/login');
        $this->load->view('user/footer_login');
        }
    }

    public function platinumaddcart(){
        if($this->session->userdata('user_login'))
        { 
            $data = array(
                'user_code'=>$this->session->userdata('code'),
                'package_code'=>"PACK003",
                'status'=>"Cart",
                'qty'=>"1",
                'price'=>"3500000"
                );

            $this->db->insert('t_order',$data);
            redirect('Userpage/cart');
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    //platinum package
    public function golddetail(){
        if($this->session->userdata('user_login')){
            $data = array (
                    'gold' => $this->model_package->getGold(),
                    'golddetail' => $this->model_package->getGolddetail()
            );
                $this->load->view('user/header_user');
                $this->load->view('user/gold',$data);
                $this->load->view('user/footer');
        }
        else{
        //If no session, redirect to login page
        $this->load->view('user/header_login');
        $this->load->view('user/login');
        $this->load->view('user/footer_login');
        }
    }

    public function goldaddcart(){
        if($this->session->userdata('user_login'))
        { 
            $data = array(
                'user_code'=>$this->session->userdata('code'),
                'package_code'=>"PACK004",
                'status'=>"Cart",
                'qty'=>"1",
                'price'=>"4000000"
                );

            $this->db->insert('t_order',$data);
            redirect('Userpage/cart');
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function editqty($order_code)
        {
        if($this->session->userdata('user_login'))
            {
                $data = array (
                    'cart' => $this->model_order->getCartID($order_code)
            );
                $this->load->view('user/header_user');
                $this->load->view('user/edit_qty',$data);
                $this->load->view('user/footer');
            }
        else
           {
             //If no session, redirect to login page
             redirect('UserPage/login', 'refresh');
           }
        }

    public function edit_qty(){
        if($this->session->userdata('user_login'))
        { 
            $qty = $this->input->post('qty');
            if($this->input->post('package_code') == "PACK001"){
                $price = $qty*2500000;
            }elseif ($this->input->post('package_code') == "PACK002") {
                $price = $qty*3000000;
            }elseif ($this->input->post('package_code') == "PACK003") {
                $price = $qty*3500000;
            }else{
                $price = $qty*4000000;
            }
            $data = array(
                'qty'=>$qty,
                'price'=>$price
                );

            $condition['order_code'] = $this->input->post('order_code');
            $this->model_order->editOrder('t_order',$data, $condition);
            redirect('Userpage/cart');
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function putorder($order_code){
    if($this->session->userdata('user_login'))
        { 
            $data = array(
                'status'=>"Pending"
                );

            $this->db->where('order_code',$order_code);
            $this->db->update('t_order',$data);
            redirect('Userpage/pendingorder');
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function acceptedorder()
        {
        if($this->session->userdata('user_login'))
            {
                $data = array (
                    'accepted' => $this->model_order->getAcceptedOrder()
            );
                $this->load->view('user/header_user');
                $this->load->view('user/acceptedorder',$data);
                $this->load->view('user/footer');
            }
        else
           {
             //If no session, redirect to login page
             redirect('UserPage/login', 'refresh');
           }
        }

    public function pendingorder()
        {
        if($this->session->userdata('user_login'))
            {
                $data = array (
                    'pending' => $this->model_order->getPendingOrderUser()
            );
                $this->load->view('user/header_user');
                $this->load->view('user/pendingorder',$data);
                $this->load->view('user/footer');
            }
        else
           {
             //If no session, redirect to login page
             redirect('UserPage/login', 'refresh');
           }
        }

}