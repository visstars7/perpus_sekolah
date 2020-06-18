<?php 

    class Logout extends CI_Controller
    {
        public function index()
        {
            unset($_SESSION['user']);
            $_SESSION['user'] = [];

            redirect(base_url('Login'));
        }
    }