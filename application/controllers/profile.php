<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

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
	$this->load->model('profile_model');
}

public function view($id)
{
	//echo $id;
  $data["datos"] = $this->profile_model->getData($id);
  $data["id"] = $id;
  if($id!=$this->session->userdata('id'))
  {
  	$data["edit"] = false;
  }
  else
  {
  	$data["edit"] = true;
  }
  $this->load->view('profile', $data);

}
public function user($id)
{
	//echo $id;
  $data["datos"] = $this->profile_model->getData($id);
  $data["id"] = $id;
  //$data["edit"] = false;
  $this->load->view('profile', $data);

}

public function edit()
{
	//print_r($_POST);
	//Hacemos la validación de los datos
		$this->form_validation->set_rules('txtColonia', 'Colonia', 'trim');
		$this->form_validation->set_rules('txtMunicipio', 'Municipio', 'trim');
		$this->form_validation->set_rules('txtTelefono', 'Telefono', 'trim');
		$this->form_validation->set_rules('txtCelular', 'Celular', 'trim');

		//Mensajes de error
		$this->form_validation->set_message('required', '%s es requerido');
		 
		if($this->form_validation->run() == FALSE)
		{
		     //Fallo la validacion, se manda el mensaje de error.
		   //site_url('profile/view/'.$this->session->userdata('id'));
        redirect('profile/view/'.$this->session->userdata('id'));
		}
		else
		{
			//Se guarda en la base de datos
			 $arrDatos= array(
			 				'colonia'		=> $this->input->post("txtColonia"),
	   	 					'municipio' 	=> $this->input->post("txtMunicipio"),
	   	 					'telefono'		=> $this->input->post("txtTelefono"),
	   	 					'celular'		=> $this->input->post("txtCelular")
	   	 					);

			//Obtenemos el id que acabamos de registrar
			$this->profile_model->update($this->session->userdata('id'),$arrDatos);
			//site_url('profile/view/'.$this->session->userdata('id'));
            redirect('profile/view/'.$this->session->userdata('id'));
		}
} 

public function changeProfilePhoto()
{
	 //Subimos la imagen
	    $id = $this->input->post("id");
	    //echo $id; return;
			$carpetaDestino="./public/docs/".$id;
			$resultado="";
			$nameImage=$id."_".$_FILES["imgPost"]["name"];
		
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
						
				   $arrPost = array(
							'foto'		=> $nameImage );
				   $this->profile_model->update($id,$arrPost);
	    $this->session->unset_userdata('foto');
	    $this->session->set_userdata($arrPost); 

        //site_url('profile/view/'.$this->session->userdata('id'));
        redirect('profile/view/'.$this->session->userdata('id'));
		    //Termina subir imagen
}

}
