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
 
    // add a document record 
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
        return $this->db->delete('documents'); 
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

    // list all documents by year, return an array
    // docid=> array(docname, docpath, subdate)
    function getAllDocsByYear($year)
    {
    } 

    // get document by docID, return an array
    // docid, docName, docPath, docDateTime
    function getDocById($docID)
    {
        $this->db->select("*");  
        $this->db->from("documents");  
        $this->db->where("id", $docID);
        $this->db->limit(1);
        $query= $this->db->get();

        if($query->num_rows == 1)
        {
            $ay_res= array();
            foreach($query->result() as $row)
            {
                $ay_res['id']=$row->id;
                $ay_res['docname']=$row->docname;
                $ay_res['docpath']=$row->docpath;
                $ay_res['subdate']=$row->subdate;
            }
            return $ay_res;
        } 
    }

    // update document record
    function updateDoc($docID, $docname)
    {
        $data= array(
            'docname' => $docname
        );
        
        $this->db->where('id', $docID);
        return $this->db->update('documents', $data);
    
    }

 
}
?>
