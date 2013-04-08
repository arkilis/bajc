<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
        $this->form_validation->set_rules('eoiTitle', 'EOI Title', 'required');
        $this->form_validation->set_rules('org', 'Organization', 'required');
        $this->form_validation->set_rules('word', 'Word File', 'required');
        $this->form_validation->set_rules('pdf', 'PDF File', 'required');
    
        if($this->form_validation->run() == FALSE)
            $this->load->view('applicant_eoi');
        else
        {
            $this->load->model("meoi");
            $ret= $this->meoi->addEOIUser();
        }

    }

    // go proposal submission page
    public function goApplicantProposal()
    {
        $this->load->view('applicant_proposal');
    }
    
    // submit proposal
    public function addProposal()
    {
    }
    
    // go project submission page
    public function goApplicantProject()
    {
        $this->load->view('applicant_project');
    }
   
    // submit project
    public function addProject()
    {
    }    
 
    // go other documents  page
    public function goApplicantOtherDoc()
    {
        $this->load->view('applicant_otherdoc');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
