<?php
class Login extends CI_CONTROLLER{
    public function __construct(){
        parent::__construct();
        $this->load->model('Login_model');
    }

    public function index(){
        $data['header'] = 'Login';
        $data['title'] = 'Login';

        $this->load->view("templates/header", $data);
        $this->load->view("login/login");
        $this->load->view("templates/footer");
    }

    public function cekLogin(){		
        $username = $this->input->post('username', TRUE);
		$password = $this->input->post('password', TRUE);
		$where = array(
			'username' => $username,
            'password' => $password
        );

        $admin = $this->Login_model->cekLogin("admin", $where);
        $cek = COUNT($admin);

		if($cek > 0){
            
            $level = $admin['level'];

			$data_session = array(
				'level' => $level,
				'status' => "login"
            );
            
            // var_dump($level);
			$this->session->set_userdata($data_session);
            
            if($level == 'super'){
                redirect(base_url("agency/batch/3"));
            } else if($level == 'adminagency'){
                redirect(base_url("agency/batch/3"));
            } else if($level == 'adminsi'){
                redirect(base_url("lac/listlac"));
            } else if($level == 'keuangan'){
                redirect(base_url("marketing/si"));
            }
 
		}else{
            $this->session->set_flashdata('login', 'Maaf, kombinasi username dan password salah');
			redirect(base_url("login"));
		}
    }

    function logout(){
        // $this->session->set_flashdata('login', 'Berhasil logout');
        $this->session->sess_destroy();
        redirect(base_url("login"));
    }
}