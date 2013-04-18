<?php

class MEOI extends CI_Model{

    function MEOI(){
        parent::__construct();
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

    // add an eoi_user
    function addEOIUser()
    {
        $data= array(
            'eoiid'=>$this->security->xss_clean($this->input->post('eoiid')),
            'userid'=>$this->security->xss_clean($this->input->post('ci')),
            'subdate'=>$this->security->xss_clean($this->input->post('subdate')),
            'title'=>$this->security->xss_clean($this->input->post('eoiTitle')),
            'org'=>$this->security->xss_clean($this->input->post('org')),
            'doc1'=>$this->security->xss_clean($this->input->post('word')),
            'doc2'=>$this->security->xss_clean($this->input->post('pdf'))
        );
        $this->db->insert('eoi_user', $data);
    }

    // delete an eoi_user
    function delEOIUser($eoiid, $userid)
    {
        $this->db->delete('eoi_user', array('eoiid' => $eoiid, 'userid' => $userid));
    }    



}
?>
