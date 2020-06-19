<?php 

    class Surat extends CI_Controller
    {
        public function __CONSTRUCT()
        {
            parent::__CONSTRUCT();
            if(!isset($_SESSION['user']))
            {
                $this->session->set_flashdata('pesan',"<div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                Anda Harus Login dahulu
                </div>");
                
                redirect(base_url('Login'));
            }
            $this->load->model('M_kelola');
        }

        public function detail_surat($idSurat)
        {
            $data['surat'] = $this->M_kelola->detailSurat($idSurat);

            $this->load->view('pages/admin_pages/v_detail_surat',$data);
        }

        public function hapus($idSurat)
        {
            $this->M_kelola->delete("tb_surat_perintah","id_surat",$idSurat);
            redirect(base_url('Dashboard'));
        }
    }