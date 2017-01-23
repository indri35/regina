<?php
class Model_package extends CI_model{
    
    
    function getAll(){
        // mereturn seluruh data dari tabel siswa
        $this->db->select('*');
		$this->db->from('t_package');

		$query = $this->db->get();
        return $query;
    }

    function getSilver(){
        // mereturn seluruh data dari tabel siswa
        $name="Silver Pack";
        $this->db->select('*');
        $this->db->from('t_package');
        $this -> db -> where('name', $name);

        $query = $this->db->get();
        return $query;
    }

    function getSilverdetail(){
        $id_package="1";
        $this->db->select('*');
        $this->db->from('t_detail_product');
        $this -> db -> where('id_package', $id_package);

        $query = $this->db->get();
        return $query;
    }

    function getBronze(){
        // mereturn seluruh data dari tabel siswa
        $name="Bronze Pack";
        $this->db->select('*');
        $this->db->from('t_package');
        $this -> db -> where('name', $name);

        $query = $this->db->get();
        return $query;
    }

    function getBronzedetail(){
        $id_package="2";
        $this->db->select('*');
        $this->db->from('t_detail_product');
        $this -> db -> where('id_package', $id_package);

        $query = $this->db->get();
        return $query;
    }

    function getPlatinum(){
        // mereturn seluruh data dari tabel siswa
        $name="Platinum Pack";
        $this->db->select('*');
        $this->db->from('t_package');
        $this -> db -> where('name', $name);

        $query = $this->db->get();
        return $query;
    }

    function getPlatinumdetail(){
        $id_package="3";
        $this->db->select('*');
        $this->db->from('t_detail_product');
        $this -> db -> where('id_package', $id_package);

        $query = $this->db->get();
        return $query;
    }

    function getGold(){
        // mereturn seluruh data dari tabel siswa
        $name="Gold Pack";
        $this->db->select('*');
        $this->db->from('t_package');
        $this -> db -> where('name', $name);

        $query = $this->db->get();
        return $query;
    }

    function getGolddetail(){
        $id_package="4";
        $this->db->select('*');
        $this->db->from('t_detail_product');
        $this -> db -> where('id_package', $id_package);

        $query = $this->db->get();
        return $query;
    }

    function updatePackage($daba,$data,$code)
    {
        //untuk update data ke database
        if(isset($_POST['save'])) {
            $this->db->where($code);
            $this->db->update($daba,$data);
            $notif['info'] = 'Save';
            
        }
        $notif['info'] = 'Save Failed';
    }   

    function detail($code){
        return $this->db->get_where('t_package',array('id'=>$id));
    }
}


