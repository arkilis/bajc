<?php

/****************************************************
User class for all users (Applicant, TAC Member, Admi
n, Board Member)
*****************************************************/


class MUser extends CI_Model{

    function MUser(){
        parent::__construct();
    }

    // login validation
    function validate($email, $password)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email', $email);
        $this->db->where('password', md5($password));
        $this->db->limit(1);
        $query = $this->db->get();
        
        if($query->num_rows == 1)
        {
            $ay_res= array();
            foreach($query->result() as $row)
            {
                $ay_res['id']=$row->id;
                $ay_res['title']=$row->title;
                $ay_res['fname']=$row->fname;
                $ay_res['lname']=$row->lname;
                $ay_res['email']=$row->email;
                $ay_res['gender']=$row->gender;
                $ay_res['mobile']=$row->mobile;
                $ay_res['phone']=$row->work_phone;
                $ay_res['address']=$row->address;
                $ay_res['type']=$row->type;
            }
            return $ay_res;
        }
        else
            return false;
    }

    // logout
    function logout()
    {
        $this->load->library('session');
        $data= array(
            'email' =>  "",
            'id'=>      "",
            'title'=>   "",
            'fname'=>   "",
            'lname'=>   "",
            'gender'=>  "",
            'mobile'=>  "",
            'phone'=>   "",
            'address'=> "",
            'type'=>    "",
            'is_logged_in' => NULL
        );
        $this->session->unset_userdata($data); // destroy session
        //echo("<script>alert('Thank you for using!')</script>");
        $this->load->view('login');
    }

    // add a new user to db
    function addUser(){
        $data= array(
            'title'=>$this->security->xss_clean($this->input->post('title')),
            'fname'=>$this->security->xss_clean($this->input->post('fname')),
            'lname'=>$this->security->xss_clean($this->input->post('lname')),
            'gender'=>$this->security->xss_clean($this->input->post('gender')),
            'email'=>$this->security->xss_clean($this->input->post('email')),
            'password'=>$this->security->xss_clean(md5($this->input->post('password'))),
            'mobile'=>$this->security->xss_clean($this->input->post('mobile')),
            'work_phone'=>$this->security->xss_clean($this->input->post('work_phone')),
            'address'=>$this->security->xss_clean($this->input->post('address')),
            'type'=>$this->security->xss_clean($this->input->post('type'))
        );
        
        $this->db->insert('user', $data);
    }

    // delete a user
    function delUser($userid)
    {
        $this->db->delete('user', array('id' => $userid ));        
    }

    // activate an user
    function activateUser($userid)
    {
        $data= array(
            'status' => 1
        );
        $this->db->where('id', $userid);
        $this->db->update('user', $data);
    }     

    // de-activate a new user
    function deactivateUser($userid)
    {
        $data= array(
            'status' => 0
        );
        $this->db->where('id', $userid);
        $this->db->update('user', $data);
    }

    // update user's details
    function updateInfo($userid)
    {
        $data= array(
            'title' => $this->security->xss_clean($this->input->post('title')),   
            'gender' => $this->security->xss_clean($this->input->post('gender')),
            'fname' => $this->security->xss_clean($this->input->post('fname')),
            'lname' => $this->security->xss_clean($this->input->post('lname')),
            'password' => md5($this->security->xss_clean($this->input->post('password'))),
            'mobile'=>$this->security->xss_clean($this->input->post('mobile')),
            'work_phone'=>$this->security->xss_clean($this->input->post('work_phone')),
            'address'=>$this->security->xss_clean($this->input->post('address')),
        );

        // update db record
        $this->db->where('id', $userid);
        return $this->db->update('user', $data);
    }

    // list all the users
    // id => title, fname, lname...
    function getAllUsers()
    {
       $ay_res= array();
       $query= $this->db->query("select * from user");
       if($query->num_rows()>0)
       {
            foreach ($query->result() as $row)
            {
                $ay_tmp= array();
                $ay_tmp[]=$row->title;      // 0
                $ay_tmp[]=$row->fname;      // 1
                $ay_tmp[]=$row->lname;      // 2
                $ay_tmp[]=$row->gender;     // 3
                $ay_tmp[]=$row->email;      // 4
                $ay_tmp[]=$row->mobile;     // 5
                $ay_tmp[]=$row->work_phone; // 6
                $ay_tmp[]=$row->address;    // 7
                $ay_tmp[]=$row->type;       // 8
                $ay_tmp[]=$row->status;     // 9
                
                $ay_res[$row->id]=$ay_tmp; 
            }
        }
        return $ay_res; 
    } 


    // get User from userid
    // 
    function getUserById($userid)
    {
        $ar_res= array();

    }

}

?>
