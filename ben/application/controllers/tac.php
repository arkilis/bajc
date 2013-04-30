<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tac extends CI_Controller {

	public function index()
	{
        $this->load->view('tac_eoi');
	}

    // go EOI list page
    function goViewEOIs()
    {
       $this->load->view("tac_eoi"); 
    } 

    // go Proposal list page
    function goViewProposal()
    {
       $this->load->view("tac_proposal"); 
    } 

    // go Project list page
    function goViewProject()
    {
       $this->load->view("tac_project"); 
    } 
    // go reports list page
    function goViewReport()
    {
       $this->load->view("tac_report"); 
    } 
    // go other document list page
    function goViewOtherDocs()
    {
       //$this->output->enable_profiler(TRUE); 
       $this->load->model('mdocuments');
       $data['ay_res']= $this->mdocuments->getAllDocs();
       //print_r($data);
       $this->load->view("tac_otherDocs", $data); 
    } 
    // thanks page
    function thanks()
    {
        echo("<h1>Thank you!</h1>");
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
