<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    // login and index page
	public function index()
	{
        $this->load->view('login');
	}

    // login controller
    public function ctlValidate()
    {
        // debug switch
        $this->output->enable_profiler(TRUE);

        // vlidate input
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');        
        $this->form_validation->set_rules('password', 'Password', 'required');        
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('login');
        }
        else
        {
            // call model function
            $this->load->model("muser");
            $validate= $this->muser->validate($this->input->post('email'), $this->input->post('password'));
      
            var_dump($validate); 
            if($validate["id"]!="")
            {
                // should be a php array contain all necessary info of a user
                $data= array(
                    'email' =>  $this->input->post('email'),
                    'id'=>      $validate["id"],
                    'title'=>   $validate["title"],
                    'fname'=>   $validate["fname"],
                    'lname'=>   $validate["lname"],
                    'gender'=>  $validate["gender"],
                    'mobile'=>  $validate["mobile"],
                    'phone'=>   $validate["phone"],
                    'address'=> $validate["address"],
                    'type'=>    $validate["type"],
                    'is_logged_in' => true
                );

                $this->session->set_userdata($data);
                
                // redirect to diff page
                if($data['type']==0)
                    redirect('applicant/goApplicantEOI');
                elseif($data['type']==1)
                    redirect('welcome/thanks', 'refresh');
                elseif($data['type']==2)
                    redirect('welcome/thanks', 'refresh');
                else
                    redirect('welcome/thanks', 'refresh');
            }
            else
                $this->index(); // incorrect email or password
        }
    }

    // Go to register Page
    public function goRegister()
    {
        $this->load->view('register'); 
    }

  
    // save user
    public function saveUser()
    {
        // vlidate input
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');        
        $this->form_validation->set_rules('fname', 'First Name', 'required');        
        $this->form_validation->set_rules('lname', 'Last Name', 'required');        
        $this->form_validation->set_rules('password', 'Password', 'required|repassword');        
        $this->form_validation->set_rules('password', 'Password Confirmation', 'required');        
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('register');
        }
        else
        {
            // call muser model 
            //echo("<h1>Thank you for registration!</h1>"); 
            $this->load->helper('url');    
            $this->load->model('MUser', '', TRUE);
            $this->MUser->addUser();
             
        }
               
    }

    // delete an user
    public function delUser($userid)
    {
        $this->load->model("muser");
        $validate= $this->muser->delUser($this->security->xss_clean($userid));
    }

    // call to activate an user
    function activateUser($userid)
    {
        $this->load->model("muser");
        $validate= $this->muser->activateUser($this->security->xss_clean($userid));
    } 

    // call to de-activate an user
    function deactivateUser($userid)
    {
        $this->load->model("muser");
        $validate= $this->muser->deactivateUser($this->security->xss_clean($userid));
    } 

    // get password back view page
    public function goForgetPassword()
    {
        $this->load->view('forgetPasswd'); 
    }
   
    // get password back logical
    public function getPassword()
    {
        
    }
    
        
    // thanks page
    function thanks()
    {
        echo("<h1>Thank you!</h1>");
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
