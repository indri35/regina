<?php
class Model_user extends CI_model{
    
    function getAllAdmin(){
        // mereturn seluruh data dari tabel siswa
        $this->db->select('*');
		$this->db->where('hak_akses =','1');
		$this->db->from('t_user');

		$query = $this->db->get();
        return $query;
    }

    function getUserID($code){
        // mereturn seluruh data dari tabel siswa
        $this->db->select('*');
        $this->db->where('code =',$code);
        $this->db->from('t_user');

        $query = $this->db->get();
        return $query;
    }

    function editUser($daba,$data,$code)
    {   
        if(isset($_POST['save'])) {
            $this->db->where($code);
            $this->db->update($daba, $data);
            $notif['info'] = 'Berhasil Menyimpan';
            
        }
        $notif['info'] = 'Gagal menyimpan';
    }

    function getEditAdmin($code){
        // mereturn seluruh data dari tabel siswa
        $this->db->select('*');
		$this->db->where('code =',$code);
		$this->db->from('t_user');

		$query = $this->db->get();
        return $query;
    }

    function getAllDistributor(){
        // mereturn seluruh data dari tabel siswa
        $this->db->select('*');
		$this->db->where('hak_akses =','2');
		$this->db->from('t_user');

		$query = $this->db->get();
        return $query;
    }
    
    function getCountDistributor(){
        // mereturn seluruh data dari tabel siswa
        $this->db->select('code, COUNT(code) as distributor');
		$this->db->where('hak_akses =','2');
		$this->db->from('t_user');

		$query = $this->db->get();
        return $query;
    }

    function addUser($daba,$data)
	{
		//untuk insert data ke database
		if(isset($_POST['save'])) {
			$this->db->insert($daba, $data);
			$notif['info'] = 'Save';
			
		}
		$notif['info'] = 'Save Failed';
	}	
}



