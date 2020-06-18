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

        public function detailSurat($idSurat)
        {

            return $this->db->get_where('vw_surat_perintah',['id_surat' => $idSurat])->row();

        }

        public function deleteSurat($idSurat)
        {
            $this->db->where('id_surat',$idSurat);
            $this->db->delete('tb_surat_perintah');
        }
    }