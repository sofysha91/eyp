<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

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
		$this->load->model('post_model');
	}
	public function index()
	{
		
	}

	public function getPaginas()
	{
		$res="";
		$data = $this->post_model->getPaginas();
		foreach ($data as $pagina) 
		{
			$res.="<li><a href='";
			$res.= site_url('profile/view/'.$pagina->idUser);
			$res.="'>".$pagina->name."</a></li>";
		}

		echo $res;
	}

	public function addComent()
	{
		//print_r($_FILES);  return;
		//Hacemos la validación de los datos
		$this->form_validation->set_rules('idPost', 'ID', 'trim');
		$this->form_validation->set_rules('txtComent', 'Comentario', 'trim');

		//Mensajes de error
		$this->form_validation->set_message('required', '%s es requerido');
		 
		if($this->form_validation->run() == FALSE)
		{
		    //Fallo la validacion, se manda el mensaje de error.

		    $this->load->view('home');
		}
		else
		{

			//Verificamos si quien realiza el post esta registrado, sino usamos un id default (-1)
			 $idUser="-1";
			 if ($this->session->userdata('is_logged_in'))
      		 {
      		 	$idUser=$this->session->userdata('id');
      		 }

			//Se guarda en la base de datos
			$arrDatos= array(
			 				'idUser'		=> $idUser,
	   	 					'idPost' 		=> $this->input->post("idPost"),
	   	 					'created_at'	=> date("Y-m-d H:i:s"),
	   	 					'message'		=> $this->input->post("txtComent")
	   	 					);

			$this->post_model->addComent($arrDatos);

			$this->load->view('home');
		}

	}

	public function addPost()
	{
		//print_r($_FILES);  return;
		//Hacemos la validación de los datos
		$this->form_validation->set_rules('txtNombre', 'Nombre', 'trim');
		$this->form_validation->set_rules('txtRaza', 'Raza', 'trim');
		$this->form_validation->set_rules('txtTamano', 'Tama&ntilde;o', 'trim');
		$this->form_validation->set_rules('txtDescripcion', 'Descripcion', 'trim');
		$this->form_validation->set_rules('txtColonia', 'Colonia', 'trim');
		$this->form_validation->set_rules('txtCP', 'CP', 'trim');
		$this->form_validation->set_rules('txtTel', 'Telefono', 'trim');

		//Mensajes de error
		$this->form_validation->set_message('required', '%s es requerido');
		 
		if($this->form_validation->run() == FALSE)
		{
		    //Fallo la validacion, se manda el mensaje de error.

		    $this->load->view('home');
		}
		else
		{

			//Verificamos si quien realiza el post esta registrado, sino usamos un id default (-1)
			 $idUser="-1";
			 if ($this->session->userdata('is_logged_in'))
      		 {
      		 	$idUser=$this->session->userdata('id');
      		 }

			//Se guarda en la base de datos
			$arrDatos= array(
			 				'idUser'		=> $idUser,
	   	 					'category' 		=> $this->input->post("category"),
	   	 					'created_at'	=> date("Y-m-d H:i:s"),
	   	 					'block'			=> 1
	   	 					);
			//Guardamos obteniendo el id del post
			$idPost = $this->post_model->add_post($arrDatos);

			//Subimos la imagen
			$nameImage=NULL;
			if($_FILES["imgPost"]["name"]!=NULL)
			{
			$carpetaDestino="./public/docs/imagenPost";
			$resultado="";
			$nameImage=$idPost."_".$_FILES["imgPost"]["name"];
		
				//Si no esta creado, lo creamos
				if(!file_exists($carpetaDestino))
				{
					$dirmake = mkdir("$carpetaDestino");
			        chmod("$carpetaDestino",0777); 
				}	 
			   // si es un formato de imagen 
				  		    if($_FILES["imgPost"]["type"]=="image/jpeg" || $_FILES["imgPost"]["type"]=="image/pjpeg" || $_FILES["imgPost"]["type"]=="image/gif" || $_FILES["imgPost"]["type"]=="image/png") 
				  		       {
				  		       	 //si existe la carpeta o se ha creado 
				  		       	  if(file_exists($carpetaDestino)) 
				  		       	     {
				  		       	     	 $origen=$_FILES["imgPost"]["tmp_name"]; 
				  		       	     	 $destino=$carpetaDestino."/".$nameImage; 
										 //Verificamos si existe el archivo
										 //si existe la carpeta o se ha creado 
						  		       	  if(!file_exists($destino)) 
						  		       	     {				  		       	     								   
						  		       	     	 //movemos el archivo 
						  		       	     	  if(move_uploaded_file($origen, $destino)) 
						  		       	     	    {
						  		       	     	    	 $resultado.= "<br>".$_FILES["imgPost"]["name"]." movido correctamente"; 
													}
												  else
												    {
												    	 $resultado.= "<br>No se ha podido mover el archivo: ".$_FILES["imgPost"]["name"]; 
													}
											 }
										  else 
										     {
												$resultado.="<br />".$_FILES["imgPost"]["name"]." archivo duplicado"; 
										     } 
									 }
								 else
								     {
								     	 $resultado.= "<br>No se ha podido crear la carpeta: "; 
									 } 
							   }
							else
							   {
							   	 $resultado.= "<br>".$_FILES["imgPost"]["name"]." - NO es imagen"; 
							   } 
			}		
				   
			
		    //Termina subir imagen

			//Guardamos con la imagen y el idPost
			$arrPost = array(
							'idPost'		=> $idPost,
							'images'		=> $nameImage,
							'nombreUser'	=> $this->input->post("txtNombre"),
							'race'			=> $this->input->post("txtRaza"),
							'size'			=> $this->input->post("txtTamano"),
							'cp'			=> $this->input->post("txtCP"),
							'tel'			=> $this->input->post("txtTel"),
							'content'		=> $this->input->post("txtDescripcion"),
							'localization'	=> $this->input->post("txtColonia")
						);
			$this->post_model->add_data_post($arrPost);

			/*Regresamos a la pagina*/
			switch ($this->input->post("category")) 
			{
				case '1':
					redirect('home/adopciones', 'refresh');
					break;
				case '2':
					redirect('home/encontrados', 'refresh');
					break;
				case '3':
					redirect('home/perdidos', 'refresh');
					break;
				case '4':
					redirect('home', 'refresh');
					break;
				
				default:
					redirect('home', 'refresh');
					break;
			}
		}
	}

	
}
