<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Board extends CI_Controller {

	public function index()
	{
		$this->load->view('board_project_reports');
	}

    // go to view all projects and reports
    function goViewProjReports()
    {
        $this->load->view("board_project_reports");
    }
    
    // go to view all projects reports
    /*
    function goViewReports()
    {
        $this->load->view("board_reports");
    }
    */

    // go to view all the other documents 
    function goViewOther()
    {
        $this->load->model('mdocuments');
        $data['ay_res']= $this->mdocuments->getAllDocs();
        $this->load->view("board_otherDocs", $data);
    }

    // thanks page
    function thanks()
    {
        echo("<h1>Thank you!</h1>");
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
