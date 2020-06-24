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
                // pagination surat masuk
                $jumlahRow                  = $this->M_kelola->totalRows("tb_surat_perintah");
                $config['base_url']         = base_url('Dashboard/index');
                $config['total_rows']       = $jumlahRow;
                $config['per_page']         = 4;
                $config['first_link']       = 'First';
                $config['last_link']        = 'Last';
                $config['next_link']        = 'Next';
                $config['prev_link']        = 'Prev';
                $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
                $config['full_tag_close']   = '</ul></nav></div>';
                $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
                $config['num_tag_close']    = '</span></li>';
                $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
                $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
                $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
                $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
                $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
                $config['prev_tagl_close']  = '</span>Next</li>';
                $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
                $config['first_tagl_close'] = '</span></li>';
                $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
                $config['last_tagl_close']  = '</span></li>';

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