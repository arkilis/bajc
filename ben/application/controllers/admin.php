<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index()
	{
        $this->goViewEOI();
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
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
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

    // call to activate an user
    function activateUser($userid)
    {
        $this->load->model("muser");
        $validate= $this->muser->activateUser($this->security->xss_clean($userid));
        echo("<script>alert('Account has been activated successfully!');</script>");
    } 

    // call to de-activate an user
    function deactivateUser($userid)
    {
        $this->load->model("muser");
        $validate= $this->muser->deactivateUser($this->security->xss_clean($userid));
        echo("<script>alert('Account has been deactivated successfully!');</script>");
    } 


    // go list all users
    function listAllUsers()
    {
        $this->load->model("muser");
        $data['ay_res']= $this->muser->getallUsers();
        $this->load->view("admin_user", $data);
    }    

    // go EOI list page
    function goViewEOI()
    {
        $this->load->model("meoi");
        $data['ay_res']= $this->meoi->getAllEOIs();
        $this->load->view("admin_eoi", $data);
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

    // call to grant EOI
    function grantEOI($eoiid, $userid)
    {
        $this->load->model("meoi");
        $this->meoi->grantEOI($eoiid, $userid);
        echo("<script>alert('EOI has been granted!');</script>");
        $this->goViewEOI();
    }

    // call to ungrant EOI
    function ungrantEOI($eoiid, $userid)
    {
        $this->load->model("meoi");
        $this->meoi->ungrantEOI($eoiid, $userid);
        echo("<script>alert('EOI has been ungranted!');</script>");
        $this->goViewEOI();
    }

    // go setting up page
    function goViewSetting()
    {   
        $this->load->model('meoi');
        $this->load->model('mproposal');
        $this->load->model('mproject');
        $data['ay_res_eoi']= $this->meoi->getEOI($this->meoi->getCurrentEOI());
        $data['ay_res_proposal']= $this->mproposal->getProposal($this->meoi->getCurrentEOI());
        $data['ay_res_project']= $this->mproject->getProject($this->meoi->getCurrentEOI());
 
        $this->load->view("admin_setting", $data);
    }

    // go update eoi page
    function goViewUpdateEOI($eoiid)
    {
        $this->load->model('meoi');
        $data['ay_res']= $this->meoi->getEOI($eoiid);
        $this->load->view("admin_updateEOI", $data); 
    }

    // go add eoi page
    function goViewAddEOI()
    {
       $this->load->view("admin_addEOI"); 
    }

    // call to add an EOi
    function addEOI()
    {
        // validate input
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('eoiname', 'EOI Name', 'required');
        $this->form_validation->set_rules('startdatetime', 'Start Date & Time', 'required');
        $this->form_validation->set_rules('deadline', 'Deadline', 'required');
    
        if($this->form_validation->run() == FALSE)
            $this->load->view('admin_addEOI');
        else
        {
            $this->load->model("meoi"); 
            if($this->meoi->addEOI())
                echo("<script>alert('Succeed!');</script>");
            else
                echo("<script>alert('Failed!');</script>");
            $this->goViewSetting();
        } 

    }

    // call to update an EOi
    function updateEOI()
    {
        // validate input
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('eoiname', 'EOI Name', 'required');
        $this->form_validation->set_rules('startdatetime', 'Start Date & Time', 'required');
        $this->form_validation->set_rules('deadline', 'Deadline', 'required');
    
        if($this->form_validation->run() == FALSE)
            $this->load->view('admin_updateEOI');
        else
        {
            $this->load->model("meoi"); 
            
            //var_dump($this->meoi->updateEOI($this->security->xss_clean($this->input->post('eoiid'))));
            if($this->meoi->updateEOI($this->security->xss_clean($this->input->post('eoiid'))))
                echo("<script>alert('Succeed!');</script>");
            else
                echo("<script>alert('Failed!');</script>");
            $this->goViewUpdateEOI($this->security->xss_clean($this->input->post('eoiid'))); 
        } 
    }

    // go update proposal page
    function goViewUpdateProposal()
    {
       $this->load->view("admin_updateProposal"); 
    }
    
    // go add eoi page
    function goViewAddProposal()
    {
       $this->load->view("admin_addProposal"); 
    }

    // go update eoi page
    function goViewUpdateProject()
    {
       $this->load->view("admin_updateProject"); 
    }
    
    // go add eoi page
    function goViewAddProject()
    {
       $this->load->view("admin_addProject"); 
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
