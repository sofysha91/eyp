<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$this->load->view('home');
	}

	public function perdidos()
	{
		$this->load->view('perdidos');
	}

	public function encontrados()
	{
		$this->load->view('encontrados');
	}

	public function adopciones()
	{
		$this->load->view('adopciones');
	}

	public function aviso_de_privacidad()
	{
		$this->load->view('aviso');
	}

	public function recupera_contrasena()
	{
		$this->load->view('recupera');
	}

	public function recupera()
	{
		//This method will have the credentials validation
	   $this->load->library('form_validation');
	 
	   $this->form_validation->set_rules('txtEmail', 'Email', 'trim|required|callback_check_database');
	 
	   if($this->form_validation->run() == FALSE)
	   {
	     //Field validation failed.  User redirected to login page     
	     $this->load->view('recupera');
	   }
	   else
	   {
	     //Go to private area
	   	 $this->session->set_flashdata('msg', '1');
	     $this->load->view('recupera');
	   
	   }
	}

	 function check_database($password)
	 {
	   //Field validation succeeded.  Validate against database
	   $email = $this->input->post('txtEmail');
	 
	   //query the database
	   $result = $this->login_model->existEmail($email);
	 
	   if($result)
	   {
	     //Si existe el usuario, se cambia la contraseña y enviamos el email
	   	 //Generamos la contraseña
	   	 $length = 10;
	   	 $pass = $this->generatePassword($length);
	   	 if($this->login_model->resetPass($email,$pass))
	   	 {
	   	 	$this->load->library('email');
	   	 	$email_setting  = array('mailtype'=>'html');
			$this->email->initialize($email_setting);

			$this->email->from('noreply@earsandpaws.com.mx', 'Ears & Paws');
			$this->email->to($email);  

			$this->email->subject('Reset de Contraseña');
			$this->email->message('
									<html><body>
										Buen día se ha establecido una contraseña para poder recuperar su cuenta, la contraseña es: '.$pass.'<br/>
										favor de verificar.
										</body></html>
				                  ');	

			$this->email->send();
			 return TRUE;
	   	 }

	   	 //Si existe el email pero no se puede cambiar la contraseña se manda error
	   	  $this->form_validation->set_message('check_database', 'No se pudo cambiar la contraseña, intentar más tarde');
	   	  return false;
	    
	   }
	   else
	   {
	     $this->form_validation->set_message('check_database', 'El email no esta registrado');
	     return false;
	   }
	 }

	 //Función para generar la contraseña aleatoria
	 function generatePassword($length) 
	 {
        $lowercase = "qwertyuiopasdfghjklzxcvbnm";
        $uppercase = "ASDFGHJKLZXCVBNMQWERTYUIOP";
        $numbers = "1234567890";
        $specialcharacters = "{}[];:,./<>?_+~!@#";
        $randomCode = "";
        mt_srand(crc32(microtime()));
        $max = strlen($lowercase) - 1;
        for ($x = 0; $x < abs($length/3); $x++) {
            $randomCode .= $lowercase{mt_rand(0, $max)};
        }
        $max = strlen($uppercase) - 1;
        for ($x = 0; $x < abs($length/3); $x++) {
            $randomCode .= $uppercase{mt_rand(0, $max)};
        }
        $max = strlen($specialcharacters) - 1;
        for ($x = 0; $x < abs($length/3); $x++) {
            $randomCode .= $specialcharacters{mt_rand(0, $max)};
        }
        $max = strlen($numbers) - 1;
        for ($x = 0; $x < abs($length/3); $x++) {
            $randomCode .= $numbers{mt_rand(0, $max)};
        }
        return str_shuffle($randomCode);
    }

}
