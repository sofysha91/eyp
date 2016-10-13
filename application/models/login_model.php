<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{     
    public function __construct()
    {
        $this->load->database();
    } 
    
    function login($email, $password)
     {
            
       $query = $this->db->query("SELECT users.idUser, users.email, users.password, users.name, user_data.foto FROM users LEFT JOIN user_data ON user_data.idUser = users.idUser WHERE password = '".MD5($password)."' AND email = '".$email."' LIMIT 1");
     
       if($query -> num_rows() == 1)
       {
         return $query->result();
       }
       else
       {
         return false;
       }
     }

public function cambiaPass($id, $pass)
 {
    return $this->db->query("UPDATE users SET password = '".MD5($pass)."' where idUser = '".$id."'");
 }

 public function resetPass($email, $pass)
 {
    return $this->db->query("UPDATE users SET password = '".MD5($pass)."' where email = '".$email."'");
 }

 public function checkPassword($id,$pass)
 {
    return $this->db->query("SELECT * FROM users WHERE idUser = '".$id."' AND password = '".MD5($pass)."'");
 }

 public function existEmail($email)
 {
   $query = $this->db->query("SELECT * FROM users WHERE email = '".$email."'");
    if($query -> num_rows() == 1)
       {
         return $query->result();
       }
       else
       {
         return false;
       }
 }
    
}
