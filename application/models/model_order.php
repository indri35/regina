<?php
class Model_order extends CI_model{
    
    
    function getAll(){
        // mereturn seluruh data dari tabel siswa
        $this->db->select('*');
        $this->db->where('status !=','Cart');
		$this->db->from('t_order');

		$query = $this->db->get();
        return $query;
    }

    function getCart(){
        // mereturn seluruh data dari tabel siswa
        $this->db->select('*');
        $this->db->where('status =','Cart');
        $this->db->where('user_code =',$this->session->userdata('code'));
        $this->db->from('t_order');

        $query = $this->db->get();
        return $query;
    }

    function getCartID($order_code){
        // mereturn seluruh data dari tabel siswa
        $this->db->select('*');
        $this->db->where('status =','Cart');
        $this->db->where('order_code =',$order_code);
        $this->db->from('t_order');

        $query = $this->db->get();
        return $query;
    }

    function getAcceptedOrder(){
        // mereturn seluruh data dari tabel siswa
        $this->db->select('*');
        $this->db->where('status =','Order');
        $this->db->where('user_code =',$this->session->userdata('code'));
        $this->db->from('t_order');

        $query = $this->db->get();
        return $query;
    }

    function getPendingOrderUser(){
        // mereturn seluruh data dari tabel siswa
        $this->db->select('*');
        $this->db->where('status =','Pending');
        $this->db->where('user_code =',$this->session->userdata('code'));
        $this->db->from('t_order');

        $query = $this->db->get();
        return $query;
    }

    function editOrder($daba,$data,$order_code)
    {   
        if(isset($_POST['save'])) {
            $this->db->where($order_code);
            $this->db->update($daba, $data);
            $notif['info'] = 'Berhasil Menyimpan';
            
        }
        $notif['info'] = 'Gagal menyimpan';
    }

    function getPendingOrder(){
        // mereturn seluruh data dari tabel siswa
        $this->db->select('*');
        $this->db->where('status =','Pending');
        $this->db->from('t_order');

        $query = $this->db->get();
        return $query;
    }

    function getSilver(){
        $this->db->select('*');
        $this->db->where('status !=','Cart');
        $this->db->where('package_code=','PACK001');
        $this->db->from('t_order');

        $query = $this->db->get();
        return $query;
    }

    function getBronze(){
        $this->db->select('*');
        $this->db->where('status !=','Cart');
        $this->db->where('package_code=','PACK002');
        $this->db->from('t_order');

        $query = $this->db->get();
        return $query;
    }

    function getPlatinum(){
        $this->db->select('*');
        $this->db->where('status !=','Cart');
        $this->db->where('package_code=','PACK003');
        $this->db->from('t_order');

        $query = $this->db->get();
        return $query;
    }

    function getGold(){
        $this->db->select('*');
        $this->db->where('status !=','Cart');
        $this->db->where('package_code=','PACK004');
        $this->db->from('t_order');

        $query = $this->db->get();
        return $query;
    }

    function getCountPendingOrder(){
        // mereturn seluruh data dari tabel siswa
        $this->db->select('order_code, COUNT(order_code) as pending_order');
        $this->db->where('status =','Pending');
        $this->db->from('t_order');

        $query = $this->db->get();
        return $query;
    }

    function detail($code){
        return $this->db->get_where('t_order',array('id'=>$id));
    }
}


