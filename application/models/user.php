<?php
Class User extends CI_Model
{
  function login($code, $password)
  {
     $this -> db -> select('email, hak_akses, distributor_code, name, distributor_name, code, image, password');
     $this -> db -> from('t_user');
     $this -> db -> where('code', $code);
     $this -> db -> where('password', MD5($password));
     $this -> db -> limit(1);
   
     $query = $this -> db -> get();
   
     if($query -> num_rows() == 1)
     {
       return $query->result();
     }
     else
     {
       return false;
     }
  }

  function cekHakAkses($code){
      $query= $this->db->query("SELECT hak_akses FROM t_user WHERE code='$code'");
      if ($query->num_rows() > 0)  //Ensure that there is at least one result 
      {
         foreach ($query->result() as $row)  //Iterate through results
         {
            return $row->hak_akses;
         }
      }    
  }

  function isEmailExist($email) {
    $this->db->select('email');
    $this->db->where('email', $email);
    $query = $this->db->get('t_user');

    if ($query->num_rows() > 0) {
        return true;
      } else {
          return false;
      }
  }

  function isCodeExist($code) {
    $this->db->select('code');
    $this->db->where('code', $code);
    $query = $this->db->get('t_user');

    if ($query->num_rows() > 0) {
        return true;
      } else {
          return false;
      }
  }

  function isDistributorCodeExist($distributor_code) {
    $this->db->select('code');
    $this->db->where('distributor_code', $distributor_code);
    $query = $this->db->get('t_user');

    if ($query->num_rows() > 0) {
        return true;
      } else {
          return false;
      }
  }

  public function temp_reset_password($temp_pass){
    $data =array(
                'code' =>$this->input->post('code'),
                'reset_pass'=>$temp_pass);
                $code = $data['code'];

    if($data){
        $this->db->where('code', $code);
        $this->db->update('t_user', $data);  
        return TRUE;
    }else{
        return FALSE;
    }
  }

  public function is_temp_pass_valid($temp_pass){
      $this->db->where('reset_pass', $temp_pass);
      $query = $this->db->get('t_user');
      if($query->num_rows() == 1){
          return TRUE;
      }
      else return FALSE;
  }

  public function code_exists(){
    $code = $this->input->post('code');
    $query = $this->db->query("SELECT code, password FROM t_user WHERE code='$code'");    
    if($row = $query->row()){
        return TRUE;
    }else{
        return FALSE;
    }
 }

  function getUserPass($temp_pass)
  {
    //select produk berdasarkan id yang dimiliki
    $this->db->where('reset_pass', $temp_pass); //Akan melakukan select terhadap row yang memiliki productId sesuai dengan productId yang telah dipilih
        $this->db->select("*");
        $this->db->from("t_user");
        
        return $this->db->get();
  }

  function editNewPass($daba,$data,$reset_pass)
  { 
      $this->db->where($reset_pass);
      $this->db->update($daba, $data);
  }
}
?>