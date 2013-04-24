<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome2 extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		#$this->load->view('welcome_message');
        $this->load->helper('form');
        $data['title']= "Add a new user";
        $data['headline']= "Welcome to user registration!";
        $this->load->vars($data);
        $this->load->view('users');
	}

    // save user
    function save()
    {
        $this->load->helper('url');
        $this->load->model('MUser', '', TRUE);
        $this->MUser->addUser();
        redirect('Welcome/thanks', 'refresh');
    }
    
    // thanks page
    function thanks()
    {
        echo("<h1>Thank you!</h1>");
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
