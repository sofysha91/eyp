<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registrar_model extends CI_Model
{     
    public function __construct()
    {
        $this->load->database();
    } 
    
     public function registrar($arrDatos)
    {
      $this->db->insert('users', $arrDatos);
      $insert_id = $this->db->insert_id();

      return  $insert_id;
    }

    public function checkEmail($email)
    {
      $query= $this->db->query("SELECT * FROM users WHERE email='".$email."'");
      return $query->result();
    }

     public function userData($arrDatos)
    {
      return $this->db->insert('user_data', $arrDatos);
     
    }
    
}
