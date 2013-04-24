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
 
    
    // add an eoi
    function addEOI()
    {
        $data= array(
            'eoiname'=>$this->security->xss_clean($this->input->post('eoiname')),
            'startdatetime'=>$this->security->xss_clean($this->input->post('startdatetime')),
            'deadline'=>$this->security->xss_clean($this->input->post('deadline'))
        );

        $this->db->insert('eoi', $data);
    }

    // delete an eoi
    function delEOI($eoiid)
    {
        $this->db->where('id', $eoiid);
        $this->db->delete('eoi');   
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
        $sql.= "u.fname as fname, u.lname as lname, ";
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
                $ay_tmp[]=$row->subdate;
                $ay_tmp[]=$row->fname." ".$row->lname;
                $ay_tmp[]=$row->title;
                $ay_tmp[]=$row->org;
                $ay_tmp[]=$row->doc1;
                $ay_tmp[]=$row->doc2;
                $ay_tmp[]=$row->is_proposal;
                $ay_tmp[]=$row->eoiname;
                $ay_tmp[]=$row->userid;
                       
                $ay_res[]=$ay_tmp; 
            }
        }
        return $ay_res; 
    }

}
?>
