<?php 

    class Login extends CI_Controller
    {
        public function __CONSTRUCT()
        {
            parent::__CONSTRUCT();

            unset($_SESSION['user']);
        }

        public function index()
        {
            $this->load->view('pages/v_login');
        }

        public function Auth()
        {
            $this->form_validation->set_rules('username','username','required',
            ['required' => 'wajib masukkan username!']);

            $this->form_validation->set_rules('userID','userID','required',
            ['required' => 'wajib masukkan userID!']);

            if($this->form_validation->run() == FALSE)
            {
                $this->load->view('pages/v_login');
            }
            else
            {
                $username     = $this->input->post('username');
                $userID       = $this->input->post('userID');

                $this->load->model('M_login');
                $row          = $this->M_login->getRow($username,$userID);

                switch ($row)
                {

                    // ke halaman Petugas

                    case 1 :
                        $user         = $this->M_login->getWherePetugas($username,$userID);

                        $petugas      = [
                            'username'      => $user->nama_petugas,
                            'id_petugas'    => $user->id_petugas,
                            'id_role'       => $user->id_role
                        ];

                        $this->session->set_userdata('user',$petugas);
                        redirect(base_url('Dashboard'));
                        break;

                    // ke halaman Anggota

                    case 2 :
                        $user         = $this->M_login->getWhereAnggota($username,$userID);

                        $anggota      = [
                            'username'      => $user->nama_anggota,
                            'id_perngguna'  => $user->id_pengguna,
                            'id_role'       => $user->id_role
                        ];
                        
                        $this->session->set_userdata('user',$anggota);
                        redirect(base_url('Dashboard'));
                        break;

                    // selain itu maka kembalikan ke login

                    default:
                        $this->session->set_flashdata('pesan',"<div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        username atau password anda salah!
                        </div>");
                        redirect(base_url('Login'));
                        break;
                }
            }
            
        }
    }