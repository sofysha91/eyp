<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
function __construct()
{
	parent::__construct();
	$this->load->model('login_model');
}
public function index()
{
	$this->load->view('login');
}

public function edit($id)
{
   echo $id;
}

public function verify()
 {   
   //This method will have the credentials validation
   $this->load->library('form_validation');
 
   $this->form_validation->set_rules('email', 'Email', 'trim|required');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
 
   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page     
     $this->load->view('login');
   }
   else
   {
     //Go to private area
     redirect('home');
   
   }
 
 }
 
 function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $email = $this->input->post('email');
 
   //query the database
   $result = $this->login_model->login($email, $password);
 
   if($result)

   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' 		      => $row->idUser,
         'name'         => $row->name,
         'email'        => $row->email,
         'foto'         => $row->foto,
         'is_logged_in' =>true
       );
       $this->session->set_userdata($sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Usuario o password invalidos');
     return false;
   }
 }

public function cambiarPass()
 { 

//This method will have the credentials validation
   $this->load->library('form_validation');
 
   $this->form_validation->set_error_delimiters('', '');
   $this->form_validation->set_rules('contrasena', 'Contraseña', 'trim|required|callback_checkPass');
   $this->form_validation->set_rules('nueva', 'Nueva Contraseña', 'trim|required');

   //Mensajes de error
   $this->form_validation->set_message('required', '%s es requerido');
 
   if($this->form_validation->run() == FALSE)
   {
      echo validation_errors();
   }
   else
   {
    
    //Cambiamos en la base de datos, y moestramos el msj de satisfaccion
    if($this->login_model->cambiaPass($this->session->userdata('id'),$this->input->post("nueva")))
    {  
     echo "Se cambio la contraseña de forma correcta.";
    }
   }
 
 }

 public function checkPass($password)
 {
   $resul = $this->login_model->checkPassword($this->session->userdata('id'),$password);
 
   if($resul)
   {    
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('checkPass', 'La contraseña no es correcta');
     return false;
   }
 }

	public function logout()
  {
    $this->session->unset_userdata();
    $this->session->sess_destroy();
    header( 'Location: http://localhost/eyp/' ) ;
  }
	
}
