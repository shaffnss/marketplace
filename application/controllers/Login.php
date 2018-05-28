<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Login (LoginController)
 * Login class to control to authenticate user credentials and starts user's session.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
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
            if($role == 1){
                //Login Admin
                redirect('Admin_dashboard');
            }elseif ($role == 2) {
                //Login Klien
                redirect('Klien_dashboard');
            }elseif ($role == 3){
                //Login Anggota
                redirect('Anggota_dashboard');
            }elseif ($role == 4){
                //Login Superadmin
                redirect('Admin_dashboard');    
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
                    
                    if($res->id_roles == 1){
                //Login Admin
                        redirect('Admin_dashboard');
                    }elseif ($res->id_roles == 2) {
                //Login Klien
                        redirect('Klien_dashboard');
                    }elseif ($res->id_roles == 3){
                //Login Anggota
                     redirect('Anggota_dashboard');
                 }elseif ($res->id_roles == 4){
                //Login Superadmin
                    redirect('Admin_dashboard');
                }
            }
        }
        else
        {
            $this->session->set_flashdata('error', 'Email or password mismatch');

            redirect('/login');
        }
    }

}

        public function logout() {
            $this->session->sess_destroy();

            redirect('login');

        }

}

?>