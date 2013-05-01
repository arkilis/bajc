<?php

class MEOI extends CI_Model{

    function MEOI(){
        parent::__construct();
    }

    // get the current date and time
    public static function getDateTime()
    {
        date_default_timezone_set("Australia/Brisbane"); 
        return date('Y-m-d H:i:s');
    }


    function getEOI($eoiid)
    {
        $ay_res= array();
        
        $this->db->select('*');
        $this->db->from('eoi');
        $this->db->where('id', $eoiid);
        $query= $this->db->get();
        

        foreach($query->result() as $row)
        {
           $ay_res[]= $row->id; 
           $ay_res[]= $row->eoiname;; 
           $ay_res[]= $row->startdatetime; 
           $ay_res[]= $row->deadline; 
           $ay_res[]= $row->description;; 
        }
        return $ay_res;        
    }


    // get Current EOI, return EOI ID
    function getCurrentEOI()
    {
        // compare with date,time to get the Current EOI
        return 1;
    }
    
    // get EOI_USER record via eoiid and userid
    // return an array
    // array:  eoiid, userid, subdate, title, org, doc1, doc2, is_proposal
    function getEOIUser($eoiid, $userid)
    {
        $ay_res= array();
        
        $this->db->select('*');
        $this->db->from('eoi_user');
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
           $ay_res[]= $row->is_proposal; 
        }
        return $ay_res;        
    }    
    
    // add an eoi
    function addEOI()
    {
        $data= array(
            'eoiname'=>$this->security->xss_clean($this->input->post('eoiname')),
            'startdatetime'=>$this->security->xss_clean($this->input->post('startdatetime')),
            'deadline'=>$this->security->xss_clean($this->input->post('deadline')),
            'description'=>$this->security->xss_clean($this->input->post('description'))
        );

        $this->db->insert('eoi', $data);
    }

    // delete an eoi
    function delEOI($eoiid)
    {
        $this->db->where('id', $eoiid);
        $this->db->delete('eoi');   
    }

    // update an eoi
    function updateEOI($eoiid)
    {
        $data= array(
            'eoiname'=>$this->security->xss_clean($this->input->post('eoiname')),
            'startdatetime'=>$this->security->xss_clean($this->input->post('startdatetime')),
            'deadline'=>$this->security->xss_clean($this->input->post('deadline')),
            'description'=>$this->security->xss_clean($this->input->post('description'))
        );
        $this->db->where('id', $eoiid);
        $this->db->update('eoi', $data);
    } 

    // add an eoi_user record
    function addEOIUser($dateTime)
    {
        $data= array(
            'eoiid'     =>$this->security->xss_clean($this->input->post('eoiid')),
            'userid'    =>$this->security->xss_clean($this->input->post('ci')),
            'subdate'   =>$dateTime,
            'title'     =>$this->security->xss_clean($this->input->post('eoiTitle')),
            'org'       =>$this->security->xss_clean($this->input->post('org')),
            'doc1'      =>$this->security->xss_clean($this->input->post('word')),
            'doc2'      =>$this->security->xss_clean($this->input->post('pdf'))
        );
       
        $ret= $this->db->insert('eoi_user', $data);
        return $ret;
    }

    // delete an eoi_user
    function delEOIUser($eoiid, $userid)
    {
        $this->db->delete('eoi_user', array('eoiid' => $eoiid, 'userid' => $userid));
    }    


    // list all EOIs
    // userid, eoiid => subdate, title, org, doc1, doc2, is_proposal
    function getAllEOIs()
    {
        $ay_res= array();
        $sql = "select e.eoiname as eoiname, u.id as userid, ";
        $sql.= "u.fname as fname, u.lname as lname, eu.eoiid as eoiid,";
        $sql.= "eu.subdate as subdate, eu.title as title, "; 
        $sql.= "eu.org as org, eu.doc1 as doc1, eu.doc2 as doc2, "; 
        $sql.= "eu.is_proposal as is_proposal ";
        $sql.= "from eoi_user as eu, eoi as e, user as u ";
        $sql.= "where eu.eoiid= e.id and ";
        $sql.= "u.id= eu.userid";
        
        $query= $this->db->query($sql);
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $row)
            {
                $ay_tmp= array();
                $ay_tmp[]=$row->subdate;                // 0
                $ay_tmp[]=$row->fname." ".$row->lname;  // 1
                $ay_tmp[]=$row->title;                  // 2
                $ay_tmp[]=$row->org;                    // 3
                $ay_tmp[]=$row->doc1;                   // 4
                $ay_tmp[]=$row->doc2;                   // 5
                $ay_tmp[]=$row->is_proposal;            // 6
                $ay_tmp[]=$row->eoiname;                // 7
                $ay_tmp[]=$row->userid;                 // 8
                $ay_tmp[]=$row->eoiid;                  // 9
                       
                $ay_res[]=$ay_tmp; 
            }
        }
        return $ay_res; 
    }

    // grant EOI
    function grantEOI($eoiid, $userid)
    {
        // update eoi_user table
        $data = array('is_proposal' => 1); 
        $this->db->where('eoiid', $eoiid);
        $this->db->where('userid', $userid);
        $this->db->update("eoi_user", $data);
        
        // insert an record into proposal_user
        $this->load->model('mproposal');
        $this->mproposal->addProposalUser($eoiid, $userid);
     
        // send notification email to user
        
    }   

    // ungrant EOI
    function ungrantEOI($eoiid, $userid)
    {
        // update eoi_user table
        $data = array('is_proposal' => 0); 
        $this->db->where('eoiid', $eoiid);
        $this->db->where('userid', $userid);
        $this->db->update("eoi_user", $data);

        // delete the record from proposal_user
        $this->load->model('mproposal');
        $this->mproposal->delProposalUser($eoiid, $userid);
        
    }
    
}
?>
