<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post_model extends CI_Model
{     
    public function __construct()
    {
        $this->load->database();
    } 
    
  public function add_post($post_data)
  {
   $this->db->insert('post', $post_data);
   $insert_id = $this->db->insert_id();

   return  $insert_id;
  }

  public function getPostDataPerfil($user)
  {    
       $query= $this->db->query("SELECT users.idUser, 
                                        users.name as user, 
                                        post.idPost, 
                                        post.category, 
                                        post.idUser, 
                                        post.created_at,                                        
                                        post_data.idPost, 
                                        post_data.race, 
                                        post_data.size, 
                                        post_data.images, 
                                        post_data.content, 
                                        post_data.localization, 
                                        post_data.nombreUser,
                                        post_data.cp, 
                                        post_data.tel, 
                                        category.name as Category 
                                        FROM users 
                                        LEFT JOIN post 
                                        ON users.idUser = post.idUser 
                                        LEFT JOIN post_data 
                                        ON post_data.idPost = post.idPost 
                                        INNER JOIN category 
                                        ON category.idCategory = post.category
                                        WHERE users.idUser = '".$user."' 
                                        ORDER BY post_data.idPost desc");
      return $query->result();
   
  }

   public function add_data_post($arrPost)
   {
     return $this->db->insert('post_data', $arrPost);
   } 

   public function getComents($idPost)
   {
      $query= $this->db->query("SELECT coments.idPost,
                                coments.message,
                                coments.created_at,
                                coments.idUser,
                                users.idUser,
                                users.name,
                                user_data.idUser,
                                user_data.foto
                                FROM coments
                                LEFT JOIN users
                                ON users.idUser = coments.idUser
                                LEFT JOIN user_data
                                ON user_data.idUser = coments.idUser
                                WHERE idPost = ".$idPost);
      return $query->result();
   }

   public function addComent($arrData)
   {
     return $this->db->insert('coments', $arrData);
   } 

   public function getPaginas()
   {
      $query= $this->db->query("SELECT * FROM users WHERE groups != '1'");
      return $query->result();
   }


   public function getPostData()
   {
       $query= $this->db->query("SELECT post.idPost, 
                                        post.category, 
                                        post.idUser, 
                                        post.created_at, 
                                        users.idUser, 
                                        users.name as user, 
                                        post_data.idPost, 
                                        post_data.race, 
                                        post_data.size, 
                                        post_data.images, 
                                        post_data.content, 
                                        post_data.localization, 
                                        post_data.nombreUser,
                                        post_data.cp, 
                                        post_data.tel, 
                                        category.name as Category 
                                        FROM post 
                                        LEFT JOIN users 
                                        ON users.idUser = post.idUser 
                                        LEFT JOIN post_data 
                                        ON post_data.idPost = post.idPost 
                                        INNER JOIN category 
                                        ON category.idCategory = post.category
                                        ORDER BY post_data.idPost desc");
      return $query->result();
   }
   public function getPostDataID($category)
   {
       $query= $this->db->query("SELECT post.idPost, 
                                        post.category, 
                                        post.idUser, 
                                        post.created_at, 
                                        users.idUser, 
                                        users.name as user, 
                                        post_data.idPost, 
                                        post_data.race, 
                                        post_data.size, 
                                        post_data.images, 
                                        post_data.content, 
                                        post_data.localization,
                                        post_data.nombreUser, 
                                        post_data.cp, 
                                        post_data.tel, 
                                        category.name as Category 
                                        FROM post 
                                        LEFT JOIN users 
                                        ON users.idUser = post.idUser 
                                        LEFT JOIN post_data 
                                        ON post_data.idPost = post.idPost 
                                        INNER JOIN category 
                                        ON category.idCategory = post.category 
                                        WHERE post.category = '".$category."' 
                                        ORDER BY post_data.idPost desc");
      return $query->result();
   }

   //Con filtros
   public function getPostDataFilter($buscar)
   {
       $query= $this->db->query("SELECT post.idPost, 
                                        post.category, 
                                        post.idUser, 
                                        post.created_at, 
                                        users.idUser, 
                                        users.name as user, 
                                        post_data.idPost, 
                                        post_data.race, 
                                        post_data.size, 
                                        post_data.images, 
                                        post_data.content, 
                                        post_data.localization, 
                                        post_data.nombreUser,
                                        post_data.cp, 
                                        post_data.tel, 
                                        category.name as Category 
                                        FROM post 
                                        LEFT JOIN users 
                                        ON users.idUser = post.idUser 
                                        LEFT JOIN post_data 
                                        ON post_data.idPost = post.idPost 
                                        INNER JOIN category 
                                        ON category.idCategory = post.category
                                        Where post_data.race like '%".$buscar."%'
                                        OR post_data.size like '%".$buscar."%'
                                        OR post_data.localization like '%".$buscar."%'
                                        ORDER BY post_data.idPost desc");
      return $query->result();
   }
   public function getPostDataIDFilter($category,$buscar)
   {
       $query= $this->db->query("SELECT post.idPost, 
                                        post.category, 
                                        post.idUser, 
                                        post.created_at, 
                                        users.idUser, 
                                        users.name as user, 
                                        post_data.idPost, 
                                        post_data.race, 
                                        post_data.size, 
                                        post_data.images, 
                                        post_data.content, 
                                        post_data.localization,
                                        post_data.nombreUser, 
                                        post_data.cp, 
                                        post_data.tel, 
                                        category.name as Category 
                                        FROM post 
                                        LEFT JOIN users 
                                        ON users.idUser = post.idUser 
                                        LEFT JOIN post_data 
                                        ON post_data.idPost = post.idPost 
                                        INNER JOIN category 
                                        ON category.idCategory = post.category 
                                        WHERE post.category = '".$category."'                                        
                                        AND( post_data.race like '%".$buscar."%'
                                        OR post_data.size like '%".$buscar."%'
                                        OR post_data.localization like '%".$buscar."%' )
                                        ORDER BY post_data.idPost desc");
      return $query->result();
   }
}
