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

            $this->load->model('M_kelola');

        }

        public function index()
        {
            if($_SESSION['user']['id_role'] == '4'){

                $this->load->view('templates/admin/kepala_perpus/header_admin_template');
                $this->load->view('templates/admin/kepala_perpus/sidebar_admin_template');
                $this->load->view('pages/admin_pages/v_dashboard');
                $this->load->view('templates/admin/kepala_perpus/footer_admin_template');

            }
            elseif($_SESSION['user']['id_role'] == '3')
            {
                $this->load->view('templates/admin/admin_perpus/header_admin_template');
                $this->load->view('templates/admin/admin_perpus/sidebar_admin_template');
                $this->load->view('pages/admin_pages/v_dashboard');
                $this->load->view('templates/admin/admin_perpus/footer_admin_template');
            }
            // role pengelola
            elseif($_SESSION['user']['id_role'] == '5')
            {
                // pagination
                $jumlahRow              = $this->M_kelola->totalRows("tb_surat_perintah");
                $config['base_url']      = base_url('Dashboard/index');
                $config['total_rows']   = $jumlahRow;
                $config['per_page']     = 4;
                $this->pagination->initialize($config);

                $from          = $this->uri->segment(3);
                $data['surat'] = $this->M_kelola->persuratan();
                $data['page']  = $this->M_kelola->paginationGet("tb_rak",$config['per_page'],$from); 
                $this->load->view('templates/admin/kelola_perpus/header_admin_template');
                $this->load->view('templates/admin/kelola_perpus/sidebar_admin_template',$data);
                $this->load->view('pages/admin_pages/v_surat_kelola',$data);
                $this->load->view('templates/admin/kelola_perpus/footer_admin_template');
            }
            elseif($_SESSION['user']['id_role'] == '6')
            {
                $this->load->view('templates/admin/keuangan_perpus/header_admin_template');
                $this->load->view('templates/admin/keuangan_perpus/sidebar_admin_template');
                $this->load->view('pages/admin_pages/v_dashboard');
                $this->load->view('templates/admin/keuangan_perpus/footer_admin_template');
            }
            else{
                $this->load->view('templates/user/header_user_template');
                $this->load->view('pages/user_pages/v_dashboard');
                $this->load->view('templates/user/footer_user_template');
            }
        }

    }