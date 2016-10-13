<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GetPost extends CI_Controller {

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
        //print_r($_POST); return;
        if($this->input->post("id")!="FALSE")
        {
          $Data = $this->post_model->getPostDataPerfil($this->input->post("id"));
        }
        else
        {
          if($this->input->post("buscar")=="false")
          {
      		if($this->input->post("category")=="-1")
      		$Data = $this->post_model->getPostData();
              else{
      		$Data = $this->post_model->getPostDataID($this->input->post("category"));
      	    }
          }
          else
          {
              if($this->input->post("category")=="-1")
              $Data = $this->post_model->getPostDataFilter($this->input->post("buscar"));
              else{
              $Data = $this->post_model->getPostDataIDFilter($this->input->post("category"),$this->input->post("buscar"));
              }
          }
        }




        //print_r($Data); return;
		$res="";
		foreach ($Data as $data) 
		{
         //Usuario registrado o no
        if($data->idUser=="-1")
            $user=$data->nombreUser;
        if($data->idUser!="-1")
            $user=$data->user;

        //Para calcular la diferencia de fechas
        $time =  $this->time_elapsed_string($data->created_at);

		$res.= '<li class="media bordered">
                            <!-- User Photo -->
                            <div class="media-left">                              
                                <img class="media-object imgPerfil" src="'.base_url().'public/images/paw.jpg">                   
                            </div>
                            <!-- User Data -->
                            <div class="media-body">
                              <h4 class="media-heading">';
        if($data->idUser!="-1"){           
        $res.='<a href="';
        $res.= site_url('profile/view/'.$data->idUser);
        $res.='">'.$user.'</a>';
        }
        else{
        $res.=              $user;
    }

        $res.=             '</h4>
                              '.$time.'
                            </div>
                            <!-- Post Type -->
                            <div class="media-right">                              
                               <p class="pTipoPost">'.strtoupper($data->Category).'</p>                   
                            </div>

                            <div class="contentPost">';

        if($data->images!==NULL)
        {

         $res.='<img src="'.base_url().'public/docs/imagenPost/'.$data->images.'" class="imgPost">';

         }
        $res.='<p class="pInfoPost">
                                 ';
                                 /*if($data->race!=NULL)
                                 {
                                 	$res.= 'Raza: '.$data->race.'<br>';
                                 }
                                 if($data->size!=NULL)
                                 {
                                 	$res.= 'Tamaño: '.$data->size.'<br>';
                                 }*/
                                 if($data->localization!=NULL)
                                 {
                                 	$res.= 'Colonia: '.$data->localization.'<br>';
                                 } 
                                 /*                                
                                 if($data->tel!=NULL)
                                 {
                                 	$res.= 'Teléfono de Contacto: '.$data->tel.'<br>';
                                 }*/

                                $res.= $data->content.'
                                </p>';
                                if($data->category!="4")
                                {
                                $res.='<button type="button" class="btn btn-primary btnPost">';

                                if($data->category=="1")
                                	$res.='ADOPTAR';
                                if($data->category=="2")
                                	$res.='BUSCAR';
                                if($data->category=="3")
                                	$res.='LO ENCONTRE!';


                            $res.='</button>';
                              }
                            $res.='</div></li>
                            ';

                            //Imprimimos los comentarios
                            $comentarios = $this->post_model->getComents($data->idPost);

                            foreach ($comentarios as $comentario) 
                            {
                                $timeComent =  $this->time_elapsed_string($comentario->created_at);
                                $res.='<li class="media borderedComent">';
                                if($comentario->foto==NULL){ 
                              $res.='<img style="margin-left:-15px;" src="'.base_url().'public/images/paw.jpg " width="40" height="40" class="img-rounded" >';

                               } else { 
                              $res.='<img style="margin-left:-15px;" src="'.base_url().'public/docs/'.$comentario->idUser.'/'.$comentario->foto.'" width="40" height="40" class="img-rounded" >';
                              } 

                                $res.='<div class="divComentario">';

                                $res.='<a href="';
                                $res.= site_url('profile/view/'.$comentario->idUser);
                                $res.='">'.$comentario->name.'</a>';

                                $res.=' '.$comentario->message.'</div>
                                <div class="divTime">'.$timeComent.'</div><br></li>';
                            }

                            //Imprimimos el cuadro para el comentario
                            if ($this->session->userdata('is_logged_in'))
                            {
    
                            $res.='<li style="margin-top:-15px" class="media divComent">';
                            if($this->session->userdata('foto')==NULL){ 
                              $res.='<img style="margin-left:-15px;" src="'.base_url().'public/images/paw.jpg " width="40" height="40" class="img-rounded" >';

                               } else { 
                              $res.='<img style="margin-left:-15px;" src="'.base_url().'public/docs/'.$this->session->userdata('id').'/'.$this->session->userdata('foto').'" width="40" height="40" class="img-rounded" >';
                              } 
                            
                            $res.='<form method="post" action="'.site_url("post/addComent").'">';
                            $res.='<input type="hidden" name="idPost"  value="'.$data->idPost.'">';
                            $res.='<textarea class="form-control txtComent"  name="txtComent" cols="3" rows="2" placeholder="Deja un comentario"></textarea>
                            <br>
                            <input type="submit" class="btn btn-primary btnPost" style="height:20px;font-size:10px;" value="Comentar">
                            </form>
                            </li>';
                            
                           }
                          
        
        }
       
        $res.='<br>';
        echo $res;
	}

function time_elapsed_string($datetime, $full = false)
{
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'año',
        'm' => 'mes',
        'w' => 'semana',
        'd' => 'dia',
        'h' => 'hora',
        'i' => 'minuto',
        's' => 'segundo',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? 'Hace '.implode(', ', $string)  : 'just now';
}



	

	
}
