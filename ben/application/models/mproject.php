<?php

class MProject extends CI_Model{

    function MProject(){
        parent::__construct();
    }
   
    // get the current date and time
    public static function getDateTime()
    {
        date_default_timezone_set("Australia/Brisbane"); 
        return date('Y-m-d H:i:s');
    }

    // add a project_ueser
    function addProjectUser($eoiid, $userid)
    {
         $data= array(
            'eoiid'=>$this->security->xss_clean($eoiid),
            'userid'=>$this->security->xss_clean($userid),
            'subdate'=>$this->getDateTime()
        );

        $this->db->insert('project_user', $data);
 
    }

    // delete an project_user 
    function delProjectUser($eoiid, $userid)
    {
        $this->db->where('eoiid', $eoiid);    
        $this->db->where('userid', $userid);    
        $this->db->delete('project_user'); 
    } 


    // get all projects
    function getAllProjects()
    {
    }


    // get Proposal
    function getProject($eoiid)
    {
        $ay_res= array();
        
        $this->db->select('*');
        $this->db->from('project');
        $this->db->where('eoiid', $eoiid);
        $query= $this->db->get();
        

        foreach($query->result() as $row)
        {
           $ay_res[]= $row->eoiid; 
           $ay_res[]= $row->projectTitle;; 
           $ay_res[]= $row->subdatetime; 
           $ay_res[]= $row->deadline; 
           $ay_res[]= $row->description;; 
        }
        return $ay_res;        
    }


}
?>
