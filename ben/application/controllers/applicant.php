<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Applicant extends CI_Controller {

	public function index()
	{
        $this->load->view('applicant_eoi');
	}

    // go eoi submission page
    public function goApplicantEOI()
    {
        $this->load->view('applicant_eoi');
    }

    // submit eoi
    public function addEOIUser()
    {
        // validate input
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('eoiTitle', 'EOI Title', 'required');
        $this->form_validation->set_rules('org', 'Organization', 'required');
        $this->form_validation->set_rules('word_doc', 'Word File', 'required');
        $this->form_validation->set_rules('pdf_doc', 'PDF File', 'required');
    
        if($this->form_validation->run() == FALSE)
            $this->load->view('applicant_eoi');
        else
        {
            $this->load->model("meoi");
            $dateTime= $this->meoi->getDateTime();
            $ret= $this->meoi->addEOIUser($dateTime);
            
            // debug
            //echo(var_dump($ret)); 
            
            if($ret)
            {
                $eoititle= $this->security->xss_clean($this->input->post('eoiTitle'));
                $org= $this->security->xss_clean($this->input->post('org'));    
                $doc1= $this->security->xss_clean($this->input->post('word_doc'));
                $doc2= $this->security->xss_clean($this->input->post('pdf_doc'));
            
                global $dateTime;
            
                // send email to user
                $this->load->library("session");
                $this->load->model("memail");
                $this->memail->eoiEmail($this->session->userdata("email"), $this->session->userdata("fname")." ".$this->session->userdata("lname"),
                        $eoititle, $org, $dateTime, $doc1, $doc2);
                // send email to admin 
                echo("<script>alert('Thank you for submission!</script>"); 
                $this->memail->eoiEmailToAdmin($this->session->userdata("fname")." ".$this->session->userdata("lname"),
                        $eoititle, $org, $dateTime, $doc1, $doc2);
            }
            else
            {
                echo("<script>alert('You already submitted an EOI! For furthur support, please contact the Admin!');</script>");
                $this->goApplicantEOI();
            }
        }

    }

    // go proposal submission page
    public function goApplicantProposal()
    {
        //$this->output->enable_profiler(TRUE);
        // load eoi info to proposal
        $this->load->model('meoi');
        $this->load->library('session');
        $data['ay_res']= $this->meoi->getEOIUser($this->meoi->getCurrentEOI(), $this->session->userdata('id'));
        $this->load->view('applicant_proposal', $data);
    }
    
    // submit proposal
    public function addProposalUser()
    {
        
    }
    
    // go project submission page
    public function goApplicantProject()
    {
        //$this->output->enable_profiler(TRUE);
        // load eoi info to proposal
        $this->load->model('mproposal');
        $this->load->model('meoi');
        $this->load->library('session');
        $data['ay_res']= $this->mproposal->getProposalUser($this->meoi->getCurrentEOI(), $this->session->userdata('id'));
        $this->load->view('applicant_project', $data);
        //var_dump($data);
    }
   
    // submit project
    public function addProjectUser()
    {
    } 
 
    // go other documents page
    public function goApplicantOtherDoc()
    {
        $this->load->model('mdocuments');
        $data['ay_res']= $this->mdocuments->getAllDocs();
        $this->load->view('applicant_otherdoc', $data);

    }

    // go view submitted EOI page
    function goViewEOI()
    {
        // get current EOI id
        $eoiid=1;
        $this->load->library('session');    
        $this->load->model('meoi');
        $data['ay_res']= $this->meoi->getEOIUser($eoiid, $this->session->userdata['id']);
        $this->load->view('applicant_viewEOI', $data);
    }

    // go update profile page
    public function goUpdateProfile()
    {
        $this->load->view('applicant_updateProfile');
    }
    
    // update profile
    public function updateProfile()
    {

        // vlidate input
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('fname', 'First Name', 'required');        
        $this->form_validation->set_rules('lname', 'Last Name', 'required');        
        $this->form_validation->set_rules('password', 'Password', 'required|repassword');        
        $this->form_validation->set_rules('password', 'Password Confirmation', 'required');        
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('applicant_updateProfile');
        }
        else
        {
            // call muser model 
            //echo("<h1>Thank you for registration!</h1>"); 
            $this->load->helper('url');    
            $this->load->model('MUser', '', TRUE);
            $this->load->library('session');    
            if($this->MUser->updateInfo($this->session->userdata('id')))
            {
                echo("<script>alert('Update Details Succeed!');</script>");
                
                // update session
                $this->MUser->logout();
                //$this->load->view('applicant_updateProfile');
            }
            else
            {
                echo("<script>alert('Update Details Faild, Try it again!');</script>");
                $this->load->view('applicant_updateProfile');
            }
             
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
