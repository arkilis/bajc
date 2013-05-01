<?php

class MProposal extends CI_Model{

    function MProposal(){
        parent::__construct();
    }
 
    // get the current date and time
    public static function getDateTime()
    {
        date_default_timezone_set("Australia/Brisbane"); 
        return date('Y-m-d H:i:s');
    }
    
    // add an proposal 
    function addProposalUser($eoiid, $userid)
    {
        $data= array(
            'eoiid'=>$this->security->xss_clean($eoiid),
            'userid'=>$this->security->xss_clean($userid),
            'subdate'=>$this->getDateTime()
        );

        $this->db->insert('proposal_user', $data);
       
    }

    // delete an proposal
    function delProposalUser($eoiid, $userid)
    {
        $this->db->where('eoiid', $eoiid);    
        $this->db->where('userid', $userid);    
        $this->db->delete('proposal_user');    
    } 


    // grant Proposal
    function grantProposal($eoiid, $userid)
    {
        // update proposal_user table
        $data= array('is_project' => 1);
        $this->db->where('eoiid', $eoiid);
        $this->db->where('userid', $userid);
        $this->db->update('proposal_user', $data);

        // insert a record into project_user
        $this->load->model('mproject');
        $this->mproposal->addProjectlUser($eoiid, $userid);

        // send notification email to user
    
    }


    // ungrant Proposal
    function ungrantProposal($eoiid, $userid)
    {
        // update proposal_user table
        $data= array('is_project' => 0);
        $this->db->where('eoiid', $eoiid);
        $this->db->where('userid', $userid);
        $this->db->update('proposal_user', $data);
    
        // delete the record from project_user
        $this->load->model('mproject');
        $this->mproposal->delProjectUser($eoiid, $userid);

    }

    // get all proposals
    function getAllProposals()
    {
    }

    
    // get PROPOSAL_USER record via eoiid and userid
    // return an array
    // array:  eoiid, userid, subdate, title, org, doc1, doc2, is_proposal
    function getProposalUser($eoiid, $userid)
    {
        $ay_res= array();
        
        $this->db->select('*');
        $this->db->from('proposal_user');
        $this->db->where('eoiid', $eoiid);
        $this->db->where('userid', $userid);
        $query= $this->db->get();
        

        foreach($query->result() as $row)
        {
           $ay_res[]= $row->eoiid; 
           $ay_res[]= $row->userid; 
           $ay_res[]= $row->subdate; 
           $ay_res[]= $row->title; 
           $ay_res[]= $row->org;        // 4 
           $ay_res[]= $row->doc1; 
           $ay_res[]= $row->doc2;       
           $ay_res[]= $row->is_project; 
        }
        return $ay_res;        
    }  


    // add a proposal
    function addProposal()
    {
        $data= array(
            'eoiid'=>$this->security->xss_clean($this->input->post('eoiid')),
            'proposalname'=>$this->security->xss_clean($this->input->post('proposalname')),
            'startdatetime'=>$this->security->xss_clean($this->input->post('startdatetime')),
            'deadline'=>$this->security->xss_clean($this->input->post('deadline')),
            'description'=>$this->security->xss_clean($this->input->post('description'))
        );

        $this->db->insert('proposal', $data);
        
    }

    // delete a proposal
    function delProposal($proposalid)
    {
        $this->db->where('id', $proposalid);
        $this->db->delete('proposal');
    }

    // update an eoi
    function updateProposal($proposalid)
    {
        $data= array(
            'eoiid'=>$this->security->xss_clean($this->input->post('eoiid')),
            'proposalname'=>$this->security->xss_clean($this->input->post('proposalname')),
            'startdatetime'=>$this->security->xss_clean($this->input->post('startdatetime')),
            'deadline'=>$this->security->xss_clean($this->input->post('deadline')),
            'description'=>$this->security->xss_clean($this->input->post('description'))
        );
        $this->db->where('id', $proposalid);
        $this->db->update('proposalid', $data);
    } 


    // get Proposal
    function getProposal($eoiid)
    {
        $ay_res= array();
        
        $this->db->select('*');
        $this->db->from('proposal');
        $this->db->where('eoiid', $eoiid);
        $query= $this->db->get();
        

        foreach($query->result() as $row)
        {
           $ay_res[]= $row->eoiid;; 
           $ay_res[]= $row->proposalname;; 
           $ay_res[]= $row->subdatetime; 
           $ay_res[]= $row->deadline; 
           $ay_res[]= $row->description;; 
        }
        return $ay_res;        
    }






















}
?>
