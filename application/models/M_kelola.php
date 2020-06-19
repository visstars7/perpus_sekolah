<?php 

    class M_kelola extends CI_Model
    {

        // read surat
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

        // detail surat
        public function detailSurat($idSurat)
        {

            return $this->db->get_where('vw_surat_perintah',['id_surat' => $idSurat])->row();

        }

        // delete
        public function delete($table,$key,$id)
        {
            $this->db->where($key,$id);
            $this->db->delete($table);
        }

        // menambah data Rak
        public function insert($table,$data)
        {
            $this->db->insert($table,$data);
        }

        // update
        public function update($table,$data,$id)
        {
            $this->db->where('id_rak',$id);
            $this->db->update($table,$data);
        }

        // mengambil data semua
        public function getData($table)
        {
            return $this->db->get($table)->result();
        }

        // mengambil data rak berdasar id
        public function getWhere($table,$key,$id)
        {
            return $this->db->get_where("$table",["$key"=>$id])->result();
        }

        // total rows
        public function totalRows($table)
        {
            return $this->db->get($table)->num_rows();
        }

        // pagination data
        public function paginationGet($table,$number,$offset)
        {
            return $this->db->get($table,$number,$offset)->result();
        }

    }