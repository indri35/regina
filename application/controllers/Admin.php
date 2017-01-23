<?php

class Admin extends CI_Controller {

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

    public function admin(){
        if($this->session->userdata('logged_in')){
            $data = array (
                    'admin' => $this->model_user->getAllAdmin(),
            );
                $email = $this->session->userdata('email');
                $this->load->view('user/header');
                $this->load->view('admin/user-admin', $data);
                $this->load->view('user/footer');
        }
        else{
        //If no session, redirect to login page
        $this->load->view('user/header_login');
        $this->load->view('user/login');
        $this->load->view('user/footer_login');
        }
    }

    public function editadmin($code)
        {
        if($this->session->userdata('logged_in'))
            {
                $data = array (
                    'user' => $this->model_user->getUserID($code)
                );
                $this->load->view('user/header');
                $this->load->view('admin/editadmin',$data);
                $this->load->view('user/footer');
            }
        else
           {
             //If no session, redirect to login page
             $this->load->view('user/header_login');
             $this->load->view('user/login');
             $this->load->view('user/footer_login');
           }
         }

    public function editdistributor($code)
        {
        if($this->session->userdata('logged_in'))
            {
                $data = array (
                    'user' => $this->model_user->getUserID($code)
                );
                $this->load->view('user/header');
                $this->load->view('admin/editdistributor',$data);
                $this->load->view('user/footer');
            }
        else
           {
             //If no session, redirect to login page
             $this->load->view('user/header_login');
             $this->load->view('user/login');
             $this->load->view('user/footer_login');
           }
         }

    public function addadmin(){
        if($this->session->userdata('logged_in')){
                $this->load->view('user/header');
                $this->load->view('admin/add-admin');
                $this->load->view('user/footer');
        }
        else{
        //If no session, redirect to login page
        $this->load->view('user/header_login');
        $this->load->view('user/login');
        $this->load->view('user/footer_login');
        }
    }

    public function addnewadmin(){
                $config['upload_path'] = 'assets/dist/img/';
                $config['allowed_types'] = 'jpg|png';
                $config['overwrite'] = TRUE;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload()){
                    $error = array('error' => $this->upload->display_errors());
                    echo "<script>window.alert('Format file tidak sesuai')
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
                        'code', 'code', 'trim|required|callback_isCodeExist'
                    );

                
                if ($this->form_validation->run() == FALSE)
                {
                    // fails
                    $this->load->view('user/header');
                    $this->load->view('admin/add-admin');
                    $this->load->view('user/footer');
                }
                else
                {

                $data = array(
                                'code' => $this->input->post('code'),
                                'name' => $this->input->post('name'),
                                'email' => $this->input->post('email'),
                                'password' => md5($this->input->post('password')),
                                'image' => $gambar_value,
                                'hak_akses' =>$this->input->post('hak_akses'),
                                );
                $this->model_user->addUser('t_user',$data); //passing variable $data ke products_model
                echo "<script>window.alert('Admin create')
           window.location.href='admin';</script>";//redirect page ke halaman utama controller products 
                }
            }  
        }

        public function editdatauser(){
                $config['upload_path'] = 'assets/dist/img/';
                $config['allowed_types'] = 'jpg|png';
                $config['overwrite'] = TRUE;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload()){
                    $error = array('error' => $this->upload->display_errors());
                    echo "<script>window.alert('Format file tidak sesuai')
           window.location.href='javascript:history.back()';</script>";

                }
                else{
                    $upload_data = $this->upload->data();
                    $gambar_value = $upload_data['file_name'];
        
                        
                    // selesai upload foto, berikut adalah input database
                    

                $data = array(
                                'name' => $this->input->post('name'),
                                'distributor_code' => $this->input->post('distributor_code'),
                                'distributor_name' => $this->input->post('distributor_name'),
                                'email' => $this->input->post('email'),
                                'password' => md5($this->input->post('password')),
                                'image' => $gambar_value,
                                );
                $condition['code'] = $this->input->post('code');
                $this->model_user->editUser('t_user',$data, $condition);
            echo "<script>window.alert('User Update')
           window.location.href='javascript:history.go(-2)';</script>";//redirect page ke halaman utama controller products 
                }
            }  
    

    public function distributor(){
        if($this->session->userdata('logged_in')){
            $data = array (
                    'distributor' => $this->model_user->getAllDistributor(),
            );
                $this->load->view('user/header');
                $this->load->view('admin/user-distributor', $data);
                $this->load->view('user/footer');
        }
        else{
        //If no session, redirect to login page
        $this->load->view('user/header_login');
        $this->load->view('user/login');
        $this->load->view('user/footer_login');
        }
    }

    public function adddistributor(){
        if($this->session->userdata('logged_in')){
                $this->load->view('user/header');
                $this->load->view('admin/add-distributor');
                $this->load->view('user/footer');
        }
        else{
        //If no session, redirect to login page
        $this->load->view('user/header_login');
        $this->load->view('user/login');
        $this->load->view('user/footer_login');
        }
    }

    public function addnewdistributor(){
                $config['upload_path'] = 'assets/dist/img/';
                $config['allowed_types'] = 'jpg|png';
                $config['overwrite'] = TRUE;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload()){
                    $error = array('error' => $this->upload->display_errors());
                    echo "<script>window.alert('Format file tidak sesuai')
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
                        'code', 'code', 'trim|required|callback_isCodeExist'
                    );
                    $this->form_validation->set_rules(
                        'distributor_code', 'distributor_code', 'trim|required|callback_isDistributorCodeExist'
                    );

                
                if ($this->form_validation->run() == FALSE)
                {
                    // fails
                    $this->load->view('user/header');
                    $this->load->view('admin/add-distributor');
                    $this->load->view('user/footer');
                }
                else
                {

                $data = array(
                                'code' => $this->input->post('code'),
                                'name' => $this->input->post('name'),
                                'distributor_code' => $this->input->post('distributor_code'),
                                'distributor_name' => $this->input->post('distributor_name'),
                                'email' => $this->input->post('email'),
                                'password' => md5($this->input->post('password')),
                                'image' => $gambar_value,
                                'hak_akses' =>$this->input->post('hak_akses'),
                                );
                $this->model_user->addUser('t_user',$data); //passing variable $data ke products_model
                echo "<script>window.alert('Distributor create')
           window.location.href='distributor';</script>";//redirect page ke halaman utama controller products 
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

    public function isCodeExist($code) {
                $this->load->library('form_validation');
                $this->load->model('user');
                $is_exist = $this->user->isCodeExist($code);

                if ($is_exist) {
                    $this->form_validation->set_message(
                        'isCodeExist', '<font size="3" color=red>User Code already registered.</font>'
                    );    
                    return false;
                } else {
                    return true;
                }
            }

    public function isDistributorCodeExist($distributor_code) {
                $this->load->library('form_validation');
                $this->load->model('user');
                $is_exist = $this->user->isDistributorCodeExist($distributor_code);

                if ($is_exist) {
                    $this->form_validation->set_message(
                        'isDistributorCodeExist', '<font size="3" color=red>Distributor Code already registered.</font>'
                    );    
                    return false;
                } else {
                    return true;
                }
            }

    public function delete(){
    if($this->session->userdata('logged_in'))
        {
            $order_code = $this->uri->segment(3);
            $this->db->where('order_code',$order_code);
            $this->db->delete('t_order');
            echo "<script>window.location.href='javascript:history.back()';</script>";
        }
    elseif($this->session->userdata('user_login'))
        {
            $order_code = $this->uri->segment(3);
            $this->db->where('order_code',$order_code);
            $this->db->delete('t_order');
            echo "<script>window.location.href='javascript:history.back()';</script>";
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function deleteadmin(){
    if($this->session->userdata('logged_in'))
        {
            $code = $this->uri->segment(3);
            $this->db->where('code',$code);
            $this->db->delete('t_user');
            echo "<script>window.location.href='javascript:history.back()';</script>";
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function deletedistributor(){
    if($this->session->userdata('logged_in'))
        {
            $code = $this->uri->segment(3);
            $this->db->where('code',$code);
            $this->db->delete('t_user');
            echo "<script>window.location.href='javascript:history.back()';</script>";
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function accept($order_code,$package_code){
    if($this->session->userdata('logged_in'))
        { 
            $data = array(
                'status'=>"Order"
                );

            $this->db->where('order_code',$order_code);
            $this->db->update('t_order',$data);
            $qty = $this->db->query("select qty from t_order Where order_code = '$order_code'")->result();
            foreach($qty as $row){
                    $qty = $row->qty;
                }
            $stock_package = $this->db->query("select stock from t_package Where code = '$package_code'")->result();
            foreach($stock_package as $row){
                    $stock_package = $row->stock;
                }
            $datastock = array(
                'stock'=>$stock_package-$qty
                );
            $this->db->where('code',$package_code);
            $this->db->update('t_package',$datastock);
            redirect('Admin/index');
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    //silver package
    public function silver(){
        if($this->session->userdata('logged_in')){
            $data = array (
                    'silver' => $this->model_package->getSilver(),
                    'silver_order' => $this->model_order->getSilver(),
                    'silverdetail' => $this->model_package->getSilverdetail()
            );
                $this->load->view('user/header');
                $this->load->view('admin/silver_package',$data);
                $this->load->view('user/footer');
        }
        else{
        //If no session, redirect to login page
        $this->load->view('user/header_login');
        $this->load->view('user/login');
        $this->load->view('user/footer_login');
        }
    } 

    
    public function update_silverpack(){
    if($this->session->userdata('logged_in'))
        { 
            $data = array(
                'product' => $this->input->post('product'),
                'price' => $this->input->post('price'),
                'stock' => $this->input->post('stock')
                );

            $condition['code'] = $this->input->post('code');
                $this->model_package->updatePackage('t_package',$data, $condition); //passing variable $data ke products_model
                echo "<script>window.alert('Package Updated')
           window.location.href='silver';</script>";
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function silverupdate(){
        if($this->session->userdata('logged_in')){
            $data = array (
                    'silver' => $this->model_package->getSilver()
            );
                $this->load->view('user/header');
                $this->load->view('admin/silver_package_update',$data);
                $this->load->view('user/footer');
        }
        else{
        //If no session, redirect to login page
        $this->load->view('user/header_login');
        $this->load->view('user/login');
        $this->load->view('user/footer_login');
        }
    }

    //bronze package
    public function bronze(){
        if($this->session->userdata('logged_in')){
            $data = array (
                    'bronze' => $this->model_package->getBronze(),
                    'bronze_order' => $this->model_order->getBronze(),
                    'bronzedetail' => $this->model_package->getBronzedetail()
            );
                $this->load->view('user/header');
                $this->load->view('admin/bronze_package',$data);
                $this->load->view('user/footer');
        }
        else{
        //If no session, redirect to login page
        $this->load->view('user/header_login');
        $this->load->view('user/login');
        $this->load->view('user/footer_login');
        }
    } 

    
    public function update_bronzepack(){
    if($this->session->userdata('logged_in'))
        { 
            $data = array(
                'product' => $this->input->post('product'),
                'price' => $this->input->post('price'),
                'stock' => $this->input->post('stock')
                );

            $condition['code'] = $this->input->post('code');
                $this->model_package->updatePackage('t_package',$data, $condition); //passing variable $data ke products_model
                echo "<script>window.alert('Package Updated')
           window.location.href='bronze';</script>";
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function bronzeupdate(){
        if($this->session->userdata('logged_in')){
            $data = array (
                    'bronze' => $this->model_package->getBronze()
            );
                $this->load->view('user/header');
                $this->load->view('admin/bronze_package_update',$data);
                $this->load->view('user/footer');
        }
        else{
        //If no session, redirect to login page
        $this->load->view('user/header_login');
        $this->load->view('user/login');
        $this->load->view('user/footer_login');
        }
    }

    //platinum package
    public function platinum(){
        if($this->session->userdata('logged_in')){
            $data = array (
                    'platinum' => $this->model_package->getPlatinum(),
                    'platinum_order' => $this->model_order->getPlatinum(),
                    'platinumdetail' => $this->model_package->getPlatinumdetail()
            );
                $this->load->view('user/header');
                $this->load->view('admin/platinum_package',$data);
                $this->load->view('user/footer');
        }
        else{
        //If no session, redirect to login page
        $this->load->view('user/header_login');
        $this->load->view('user/login');
        $this->load->view('user/footer_login');
        }
    } 

    
    public function update_platinumpack(){
    if($this->session->userdata('logged_in'))
        { 
            $data = array(
                'product' => $this->input->post('product'),
                'price' => $this->input->post('price'),
                'stock' => $this->input->post('stock')
                );

            $condition['code'] = $this->input->post('code');
                $this->model_package->updatePackage('t_package',$data, $condition); //passing variable $data ke products_model
                echo "<script>window.alert('Package Updated')
           window.location.href='platinum';</script>";
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function platinumupdate(){
        if($this->session->userdata('logged_in')){
            $data = array (
                    'platinum' => $this->model_package->getPlatinum()
            );
                $this->load->view('user/header');
                $this->load->view('admin/platinum_package_update',$data);
                $this->load->view('user/footer');
        }
        else{
        //If no session, redirect to login page
        $this->load->view('user/header_login');
        $this->load->view('user/login');
        $this->load->view('user/footer_login');
        }
    }

    //gold package
    public function gold(){
        if($this->session->userdata('logged_in')){
            $data = array (
                    'gold' => $this->model_package->getGold(),
                    'gold_order' => $this->model_order->getGold(),
                    'golddetail' => $this->model_package->getGolddetail()
            );
                $this->load->view('user/header');
                $this->load->view('admin/gold_package',$data);
                $this->load->view('user/footer');
        }
        else{
        //If no session, redirect to login page
        $this->load->view('user/header_login');
        $this->load->view('user/login');
        $this->load->view('user/footer_login');
        }
    } 

    
    public function update_goldpack(){
    if($this->session->userdata('logged_in'))
        { 
            $data = array(
                'product' => $this->input->post('product'),
                'price' => $this->input->post('price'),
                'stock' => $this->input->post('stock')
                );

            $condition['code'] = $this->input->post('code');
                $this->model_package->updatePackage('t_package',$data, $condition); //passing variable $data ke products_model
                echo "<script>window.alert('Package Updated')
           window.location.href='gold';</script>";
        }
    else
        {
            //If no session, redirect to login page
            redirect('UserPage/login', 'refresh');
        }
    }

    public function goldupdate(){
        if($this->session->userdata('logged_in')){
            $data = array (
                    'gold' => $this->model_package->getGold()
            );
                $this->load->view('user/header');
                $this->load->view('admin/gold_package_update',$data);
                $this->load->view('user/footer');
        }
        else{
        //If no session, redirect to login page
        $this->load->view('user/header_login');
        $this->load->view('user/login');
        $this->load->view('user/footer_login');
        }
    }

    public function allorder(){
        if($this->session->userdata('logged_in')){
            $data = array (
                    'all_order' => $this->model_order->getAll()
            );
                $this->load->view('user/header');
                $this->load->view('admin/all_order', $data);
                $this->load->view('user/footer');
        }
        else{
        //If no session, redirect to login page
        $this->load->view('user/header_login');
        $this->load->view('user/login');
        $this->load->view('user/footer_login');
        }
    }

    public function pendingorder(){
        if($this->session->userdata('logged_in')){
            $data = array (
                    'pending_order' => $this->model_order->getPendingOrder()
            );
                $this->load->view('user/header');
                $this->load->view('admin/pending_order', $data);
                $this->load->view('user/footer');
        }
        else{
        //If no session, redirect to login page
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

}
