<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index()
	{
        // admin's homepage is the upload document page
        $this->load->view('admin_uploaddocs');
	}

    // go upload document page
    public function goUploadDocPage()
    {
        $this->load->view('admin_uploaddocs');
	}

    // do upload document
    public function uploadDoc()
    {
        // validate input
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fileName', 'Document Name', 'required');
        $this->form_validation->set_rules('doc_path', 'Upload Document', 'required');
    
        if($this->form_validation->run() == FALSE)
            $this->load->view('admin_uploaddocs');
        else
        {
            $this->load->model("mdocuments");
            
            // insert record 
            if($this->mdocuments->addDoc())
            {
                echo("<script>alert('Succeed!');</script>");
                $this->listAllDocs();
            }
            else
                echo("<script>alert('Failed!');</script>");
        } 
    }            

    // list all documents
    public function listAllDocs()
    {
        $this->load->model('mdocuments');
        $data['ay_res']= $this->mdocuments->getAllDocs(); 
        $this->load->view('admin_listAlldocs', $data); 
    }

    // delete the document
    public function delDoc($docID)
    {
        $this->load->model('mdocuments');
        if($this->mdocuments->delDoc($docID))
        {
            echo("<script>alert('Succeed!');</script>");
            $this->listAllDocs(); 
        }
        else
            echo("<script>alert('Failed!');</script>");
    }

    // go update document page
    function goUpdateDoc($docID)
    {
        $this->load->model('mdocuments');
        $data['ay_res']= $this->mdocuments->getDocById($docID);  
        $this->load->view("admin_updateDoc", $data);
    }

    // update document
    function updateDocName()
    {
        $docID=     $this->security->xss_clean($this->input->post('docid'));
        $docname=   $this->security->xss_clean($this->input->post('docname'));
        if($docID!="")
        {
            $this->load->model('mdocuments');
            if($this->mdocuments->updateDoc($docID, $docname))
            {
                echo("<script>alert('Succeed!');</script>");
                $this->listAllDocs();             
            }
            else
                echo("<script>alert('Failed!');</script>");
            
        }
    }

    // go EOI list page
    function goViewEOI()
    {
        $this->load->view("admin_eoi");
    }

    // go Proposal list page
    function goViewProposal()
    {
       $this->load->view("admin_proposal");
    }

    // go Project list page
    function goViewProject()
    {
       $this->load->view("admin_project");
    }

    // go Reports list page
    function goViewReports()
    {
       $this->load->view("admin_reports");
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
