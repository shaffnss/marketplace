<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }

    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $this->isLoggedIn();
    }
    
    /**
     * This function used to check the user is logged in or not
     */
    function isLoggedIn()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        $role = $this->session->userdata('role');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
            $this->load->view('login');
        }
        else
        {
					if($role == 1) {
						//Apabila Admin
						redirect('Admin_dashboard');
					}else if ($role == 2) {
						//Apabila Klien
						redirect('Klien_dashboard');
					}else if ($role == 3) {
						//Apabila Anggota
						redirect('Anggota_dashboard');
					}
        }
    }
    
    
    /**
     * This function used to logged in user
     */
    public function loginMe()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[128]|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[32]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->index();
        }
        else
        {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
						
            $result = $this->login_model->loginMe($email, $password);
						
            if(count($result) > 0)
            {
                foreach ($result as $res)
                {
                    $sessionArray = array('userId'=>$res->id_users,                    
                                            'role'=>$res->id_roles,
                                            'roleText'=>$res->nama_roles,
                                            'name'=>$res->nama_users,
                                            'isLoggedIn' => TRUE
                                    );
                                    
                    $this->session->set_userdata($sessionArray);
                    
                    redirect('Anggota_dashboard');
                }
            }
            else
            {
                $this->session->set_flashdata('error', 'Email or password mismatch');
                
                redirect('login');
            }
        }
    }
		
		public function logout() {
			$this->session->sess_destroy();
			
			redirect('login');
		}
}

?>