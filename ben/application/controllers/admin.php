<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index()
	{
        // admin's homepage is the upload document page
        $this->load->view('uploaddocs');
	}

    // go upload document page
    public function goUploadDocPage()
    {
        $this->load->view('uploaddocs');
	}

    // do upload document
    public function uploadDoc()
    {
        // validate input
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fileName', 'Document Name', 'required');
        $this->form_validation->set_rules('doc_path', 'Upload Document', 'required');
    
        if($this->form_validation->run() == FALSE)
            $this->load->view('uploaddocs');
        else
        {
            $this->load->model("mdocuments");
            
            // insert record 
            if($this->mdocuments->addDoc())
                echo("<script>alert('Succeed!');</script>");
            else
                echo("<script>alert('Failed!');</script>");
        } 
    }            

    // list all documents
    public function listAllDocs()
    {
        $this->load->model('mdocuments');
        $data['ay_res']= $this->mdocuments->getAllDocs(); 
        $this->load->view('listAlldocs', $data); 
    }

    // delete the document
    public function delDoc($docID)
    {
        $this->load->model('mdocuments');
        if($this->mdocuments->delDoc($docID))
            echo("<script>alert('Succeed!');</script>");
        else
            echo("<script>alert('Failed!');</script>");
            
    } 

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
