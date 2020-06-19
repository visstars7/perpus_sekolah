<?php 

    class Rak extends CI_Controller
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

        // template daftar Rak
        public function index()
        {
            $jumlahData = $this->M_kelola->totalRows('tb_rak');

            // pagination
            $config['base_url']     = base_url('kelola/Rak/index');
            $config['total_rows']   = $jumlahData;
            $config['per_page']     = 2;
            $this->pagination->initialize($config);

            $from           = $this->uri->segment(4);
            $data['rak']    = $this->M_kelola->paginationGet('tb_rak',$config['per_page'],$from);
            $data['surat']  = $this->M_kelola->persuratan();
            $this->load->view('templates/admin/kelola_perpus/header_admin_template');
            $this->load->view('templates/admin/kelola_perpus/sidebar_admin_template',$data);
            $this->load->view('pages/admin_pages/v_rak',$data);
            $this->load->view('templates/admin/kelola_perpus/footer_admin_template');
        }

        // template baris rak
        public function template_baris_rak()
        {
            $data['surat'] = $this->M_kelola->persuratan();
            $this->load->view('templates/admin/kelola_perpus/header_admin_template');
            $this->load->view('templates/admin/kelola_perpus/sidebar_admin_template',$data);
            $this->load->view('pages/admin_pages/v_baris_rak');
            $this->load->view('templates/admin/kelola_perpus/footer_admin_template');
        }

        // update Rak Template
        public function template_update_rak($id)
        {
            $data['surat'] = $this->M_kelola->persuratan();
            $data['rak'] = $this->M_kelola->getWhere('tb_rak','id_rak',$id);
            $this->load->view('templates/admin/kelola_perpus/header_admin_template');
            $this->load->view('templates/admin/kelola_perpus/sidebar_admin_template',$data);
            $this->load->view('pages/admin_pages/v_update_rak',$data);
            $this->load->view('templates/admin/kelola_perpus/footer_admin_template');
        }


        // update rak logic
        public function update_rak($id)
        {

            $this->form_validation->set_rules('nama_rak','nama_rak','required',
            ['required' => 'Wajib memasukkan nama rak']);
            $this->form_validation->set_rules('status','status','required',
            ['required' => 'Wajib memasukkan status']);

            if($this->form_validation->run() == FALSE)
            {
                $this->template_update_rak($id);
            }
            else
            {
                $rak    = $this->input->post('nama_rak');
                $status = $this->input->post('status');
                $data = [
                    'id_rak' => $rak,
                    'status' => $status
                ];
                $this->M_kelola->update("tb_rak",$data,$id);
                redirect(base_url("daftar-rak"));
            }
        }


        // delete Rak
        public function delete_rak($id)
        {
            $this->M_kelola->delete("tb_rak","id_rak",$id);
            redirect(base_url('daftar-rak'));
        }

        // Tambah Rak Template
        public function template_tambah()
        {   
            $data['surat'] = $this->M_kelola->persuratan();
            $this->load->view('templates/admin/kelola_perpus/header_admin_template');
            $this->load->view('templates/admin/kelola_perpus/sidebar_admin_template',$data);
            $this->load->view('pages/admin_pages/v_tambah_rak');
            $this->load->view('templates/admin/kelola_perpus/footer_admin_template');
        }

        // Tambah Rak
        public function insert_rak()
        {
            $this->form_validation->set_rules('nama_rak','nama_rak','required',
            ['required' => 'Wajib memasukkan nama rak']);

            if($this->form_validation->run() == FALSE)
            {
                $this->template_tambah();
            }
            else
            {
                $idRak = $this->input->post('nama_rak');
                $check = $this->M_kelola->getWhere("tb_rak","id_rak",$idRak);
                if(!empty($check))
                {
                    $this->session->set_flashdata('pesan',"<div class='alert alert-warning alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    Maaf nama rak buku sudah dipakai
                    </div>");

                    $this->template_tambah();
                }
                else
                {
                    $data = [
                        'id_rak' => $idRak,
                        'status' => 1
                    ];

                    $this->M_kelola->insert("tb_rak",$data);

                    redirect(base_url('daftar-rak'));

                }
            }
        }
    }