<?php

include_once("common.php");

// only admin can manage files

class MDocuments extends CI_Model{

    function MDocuments(){
        parent::__construct();
    }
  
    // get the current date and time
    public static function getDateTime()
    {
        date_default_timezone_set("Australia/Brisbane"); 
        return date('Y-m-d H:i:s');
    }
 
    // add a document 
    function addDoc()
    {
        $dateTime= $this->getDateTime();
        $data= array(
            'docname' => $this->security->xss_clean($this->input->post('fileName')),
            'subdate' => $dateTime,
            'docpath' => $this->security->xss_clean($this->input->post('doc_path'))
        );
       
        return $this->db->insert('documents', $data); 
    }

    // delete a document
    function delDoc($docid)
    {
        $this->db->where('id', $docid); 
        $this->db->delete('documents'); 
    }

    // list all documents, return an array
    // docid=> array(docname, docpath, subdate)
    function getAllDocs()
    {
       $ay_res= array();
       $query= $this->db->query("select * from documents");
       if($query->num_rows()>0)
       {
            foreach ($query->result() as $row)
            {
                $ay_tmp= array();
                $ay_tmp[]=$row->docname;
                $ay_tmp[]=$row->docpath;
                $ay_tmp[]=$row->subdate;
                
                $ay_res[$row->id]=$ay_tmp; 
            }
        }

        return $ay_res; 
    } 


}
?>
