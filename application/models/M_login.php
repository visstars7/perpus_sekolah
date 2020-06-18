<?php 

    class M_login extends CI_Model
    {
        public function getRow($username,$userID)
        {
            $row  = $this->db->get_where("tb_petugas_perpus",
            ['nama_petugas' => $username,'id_petugas'  => $userID,'status_petugas' => 1]);

            $rows = $this->db->get_where("tb_anggota_perpus"
            ,['nama_anggota' => $username,'id_pengguna'=> $userID,'status' => 1]);

            if($row->num_rows() > 0)
            {
                return 1;
            }
            elseif($rows->num_rows() > 0)
            {
                return 2;
            }
            else{
                return 0;
            }
        }

        public function getWherePetugas($username,$userID)
        {
            $row = $this->db->get_where("tb_petugas_perpus",
            ['nama_petugas' => $username,'id_petugas' => $userID]);

            return $row->row();

        }

        public function getWhereAnggota($username,$userID)
        {
            $rows = $this->db->get_where("tb_anggota_perpus",
            ['nama_anggota' => $username,'id_pengguna' => $userID]);
            
            return $rows->row();

        }
    }