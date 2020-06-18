<?php 

    class M_kelola extends CI_Model
    {
        public function persuratan()
        {
            $surat = $this->db->count_all('vw_surat_perintah');

            if($surat > 0)
            {
                return $dataSurat = $this->db->order_by('id_surat','DESC')->get_where('vw_surat_perintah',['status_surat_perintah' => 1,'nama_role'=>'kelola'])->result();
            }
            else
            {
                return FALSE;
            }

        }
    }