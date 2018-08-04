<?php
class User_model extends CI_model
{
   public function __construct()
   {
      parent::__construct();
      $this->load->database();
   }

   public function reg_insert($data)
   {
       
       $condition="uname="."'".$data['uname']."'";

       $this->db->select('*');
       $this->db->from('users');
       $this->db->where($condition);
       $this->db->limit('1');

       $query=$this->db->get();
       //echo $this->db->last_query();die;
       if($query->num_rows()==0) 
       {
       $this->db->insert('users',$data);

       if($this->db->affected_rows() > 0) 
       {
       return true;
       }
       }else{
       return false;
       
      }
   }

   public function login($data)
   {
   	  
     $condn="uname="."'".$data['uname']."' and "."pword="."'".$data['pword']."'";
     $this->db->select('*');
     $this->db->from('users');
     $this->db->where($condn);
     $this->db->limit('1');

     $query=$this->db->get();

     if($query->num_rows() > 0)
     {
         return true;
     }else{

     	 return false; 
     }

   }


   public function user_information($user_name)
   {
        $condn="uname="."'".$user_name."'";
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($condn);
        $this->db->limit('1');

        $query=$this->db->get();

        if($query->num_rows()==1)
        {
           return $query->result_array();
        }else{

           return false;	
        }
   }


   public function user_details($user_id)
   {
        $condn="id="."'".$user_id."'";
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($condn);
        $this->db->limit('1');

        $query=$this->db->get();

        if($query->num_rows()==1)
        {
           return $query->result_array();
        }else
        {
           return false;	
        }
   }


   public function update_user($user_id,$data)
   {
      
       $this->db->where('id',$user_id);
       $this->db->update('users',$data);
       return true; 
       //echo $this->db->last_query(); die;

   }

}
?>
