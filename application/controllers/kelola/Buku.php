<?php 

    class Buku extends CI_Controller
    {
        public function __CONSTRUCT()
        {
            if(!isset($_SESSION['user']))
            {
                $this->session->set_flashdata('pesan',"<div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                Anda Harus Login dahulu
                </div>");
                
                redirect(base_url('Login'));
            }
            $this->load->model('M_buku');
        }

    }