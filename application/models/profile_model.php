<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_model extends CI_Model
{     
    public function __construct()
    {
        $this->load->database();
    } 
    
    public function getData($id)
    {
      $query= $this->db->query("SELECT users.idUser, users.name, user_data.idUser, user_data.colonia, user_data.telefono, user_data.celular,user_data.foto, user_data.calle, user_data.estado, user_data.municipio FROM users INNER JOIN user_data on user_data.idUser = users.idUser WHERE users.idUser = ".$id);
      return $query->result();

    }

     public function update($id,$data)
    {
        $this->db->where('idUser',$id);
        $this->db->update('user_data',$data);
        return true;
    }
    
}
