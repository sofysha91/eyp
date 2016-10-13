<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Registrar extends CI_Controller {

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
	  $this->load->model('registrar_model');
	 }

	public function index()
	{
		$this->load->view('registro');
	}

	public function registro_pagina()
	{
		$this->load->view('registroOrg');
	}

	public function registro()
	{
		//Hacemos la validación de los datos
		$this->form_validation->set_rules('group', 'Grupo', 'trim|required');
		$this->form_validation->set_rules('inputNombre', 'Nombre', 'trim|required');
		$this->form_validation->set_rules('inputEmail', 'Email', 'trim|required|callback_check_database');
		$this->form_validation->set_rules('inputPass', 'Contrase&ntilde;a', 'trim|required');

		//Mensajes de error
		$this->form_validation->set_message('required', '%s es requerido');
		 
		if($this->form_validation->run() == FALSE)
		{
		     //Fallo la validacion, se manda el mensaje de error.
		    $this->load->view('registro');
		}
		else
		{
			//Se guarda en la base de datos
			 $arrDatos= array(
			 				'name'			=> $this->input->post("inputNombre"),
	   	 					'email' 		=> $this->input->post("inputEmail"),
	   	 					'groups'		=> $this->input->post("group"),
	   	 					'password'		=> md5($this->input->post("inputPass")),
	   	 					'created_at'	=> date("Y-m-d H:i:s"),
	   	 					'updated_at'	=> date("Y-m-d H:i:s"),
	   	 					'status'		=> 1
	   	 					);

			//Obtenemos el id que acabamos de registrar
			$id = $this->registrar_model->registrar($arrDatos);

			//Generamos el registro en la tabla de user_data			
			$arrData  = array(
								'idUser' => $id );
			$this->registrar_model->userData($arrData);

			//Hacemos el login por default y mandamos al home		
			$sess_array = array(
			 'id'			=> $id,
			 'name' 		=> $this->input->post("inputNombre"),
	         'email' 		=> $this->input->post("inputEmail"),
	         'foto'			=> NULL,
	         'is_logged_in' =>true
	       	);
       		$this->session->set_userdata($sess_array);
		     redirect('home', 'refresh');

		}
 
	}

	 public function check_database($email)
	 {
	   //query the database
	   $result = $this->registrar_model->checkEmail($email);
	 
	   if($result)
	   {
	     $this->form_validation->set_message('check_database', 'El email ya esta registrado');
	     return FALSE;
	   }
	   else
	   {
	     return TRUE;
	   }
	 }

}
