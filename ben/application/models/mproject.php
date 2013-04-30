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
        $this->db->delete('project_user')    
    } 


    // get all projects
    function getAllProjects()
    {
    }

}
?>
