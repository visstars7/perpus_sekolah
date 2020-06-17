<?php 


    class Dashboard extends CI_Controller
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
        }

        public function index()
        {
            $this->load->view('templates/user/header_user_template');
            $this->load->view('pages/user_pages/v_dashboard');
            $this->load->view('templates/user/footer_user_template');
        }

    }