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

            // pagination Daftar Rak
            $config['base_url']     = base_url('kelola/Rak/index');
            $config['total_rows']   = $jumlahData;
            $config['per_page']     = 5;

            // style pagination
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

            $from               = $this->uri->segment(4);
            $data['rak']        = $this->M_kelola->paginationGet('tb_rak',$config['per_page'],$from);
            $data['surat']      = $this->M_kelola->persuratan();
            $data['jumlah']     = $this->M_kelola->totalRows('vw_baris_rak');
            $data['jml_rak']    = $this->M_kelola->totalRows('tb_rak');
            $this->load->view('templates/admin/kelola_perpus/header_admin_template');
            $this->load->view('templates/admin/kelola_perpus/sidebar_admin_template',$data);
            $this->load->view('pages/admin_pages/v_rak',$data);
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
                $data   = [
                    'id_rak' => $rak,
                    'status' => $status
                ];
                $this->M_kelola->update("tb_rak",'id_rak',$data,$id);

                redirect(base_url("daftar-rak"));
            }
        }


        // delete Rak
        public function delete_rak($id)
        {
            $jumlah = $this->M_kelola->totalRowsWhere("vw_baris_rak","id_rak",$id);
            
            if(empty($jumlah))
            {
                $this->M_kelola->delete("tb_rak","id_rak",$id);
                redirect(base_url('daftar-rak'));
            }
            else
            {
                $this->session->set_flashdata('pesan',"<div class='alert alert-warning alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                Tidak dapat menghapus rak '$id' karena masih tertaut! 
                </div>");

                redirect(base_url('daftar-rak'));
            }
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

         // template baris rak
        public function template_baris_rak()
        {   
            // pagination baris rak
            $jumlahData                 = $this->M_kelola->totalRows('vw_baris_rak');
            $config['base_url']         = base_url('kelola/Rak/template_baris_rak');
            $config['total_rows']       = $jumlahData;
            $config['per_page']         = 5;
            // style pagination
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

            $from                       = $this->uri->segment(4);
            $data['ktg']                = $this->M_kelola->getWhere('tb_ktg_buku','status',1);
            $data['rak']                = $this->M_kelola->getWhere('tb_rak','status',1);
            $data['barisRak']           = $this->M_kelola->paginationGet('vw_baris_rak',$config['per_page'],$from);
            $data['surat']              = $this->M_kelola->persuratan();
            $data['jml_baris']          = $this->M_kelola->totalRows('vw_baris_rak');
            $this->load->view('templates/admin/kelola_perpus/header_admin_template');
            $this->load->view('templates/admin/kelola_perpus/sidebar_admin_template',$data);
            $this->load->view('pages/admin_pages/v_baris_rak',$data);
            $this->load->view('templates/admin/kelola_perpus/footer_admin_template');
        }

        // tambah baris rak
        public function tambah_baris_rak()
        {
            $rak        = $this->input->post('rak');
            $ktg        = $this->input->post('ktg');
            $jumlah     = $this->M_kelola->totalRows('tb_baris_rak');
            $barisRak   = $this->M_kelola->totalRowsWhere('tb_baris_rak','id_rak',$rak);

            if($barisRak == 4)
            {
                $this->session->set_flashdata('pesan',"<div class='alert alert-warning alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                Maaf baris dari rak '$rak' sudah penuh
                </div>");

                $this->template_baris_rak();
            }
            else
            {
                if($jumlah == 0)
                {
                    $data = [
                        'id_baris_rak' => $rak."1",
                        'id_rak'       => $rak,
                        'id_ktg_buku'  => $ktg
                    ];
    
                    $this->M_kelola->insert('tb_baris_rak',$data);
                }
                else{
                    $jumlah++;
                    $data = [

                        'id_baris_rak' => $rak.$jumlah,
                        'id_rak'       => $rak,
                        'id_ktg_buku'  => $ktg
                    ];
    
                    $this->M_kelola->insert('tb_baris_rak',$data);
                }
    
                redirect(base_url('baris-rak'));
            }

        }

        // template update baris rak
        public function template_update_baris($id)
        {

            $data['surat']        = $this->M_kelola->persuratan();
            $data['baris']        = $this->M_kelola->getWhereRow('tb_baris_rak','id_baris_rak',$id);
            $data['rak']          = $this->M_kelola->getWhere('tb_rak','status',1);
            $data['ktg']          = $this->M_kelola->getWhere('tb_ktg_buku','status',1);

            $this->load->view('templates/admin/kelola_perpus/header_admin_template');
            $this->load->view('templates/admin/kelola_perpus/sidebar_admin_template',$data);
            $this->load->view('pages/admin_pages/v_update_baris',$data);
            $this->load->view('templates/admin/kelola_perpus/footer_admin_template');
        }

        public function updated_baris_rak()
        {
            $rak    = $this->input->post('rak');
            $ktg    = $this->input->post('ktg');
            $id     = $this->input->post('id_baris_rak');
            
            $jumlah = $this->M_kelola->totalRowsWhere('tb_baris_rak','id_rak',$rak);
            if($jumlah == 4)
            {
                $this->session->set_flashdata('pesan',"<div class='alert alert-warning alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                Maaf baris dari rak '$rak' sudah penuh
                </div>");
                $this->template_baris_rak();
            }
            else
            {
                $data = [
                    'id_ktg_buku'  => $ktg
                ];
    
                $this->M_kelola->update('tb_baris_rak','id_baris_rak',$data,$id);
    
                redirect(base_url('baris-rak'));
            }
        }

        // delete baris rak
        public function delete_baris_rak($id)
        {
            $this->M_kelola->delete('tb_baris_rak','id_baris_rak',$id);
            redirect(base_url('baris-rak'));
        }
    }