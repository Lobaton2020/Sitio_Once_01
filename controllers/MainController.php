<?php
require_once "helper/getDate.php";
require_once "models/Imagen.php";
class MainController
{   
    private $model;
       
    public function __construct(){
        if(empty($_SESSION["id_user"]) || !isset($_SESSION["id_user"])){
            header("location:?c=auth");
         }  
         $this->model = new Imagen();   
     
    }
       
       
       
    public function index()
    {   
        $num = isset($_REQUEST["num"]) ? filter_var($_REQUEST["num"],FILTER_SANITIZE_NUMBER_INT) : 1 ;
        $num = $num == 0 ? 1 : $num ;
        $response = array();
        $response =  $this->model->getall($num);
        $images = $response[0];
        // exit(print_r($images));
        $page = $response[1];
        $paginate = $response[2];
        $contenido = "main/content.php";    
        require_once "views/template/main/content.php"; 

     
    }
    
    public function image()
    {
        $contenido = "main/image.php";    
        require_once "views/template/main/content.php"; 

     
    }
    public function save_image()
    {
        $numFiles = count($_FILES["imagen"]["name"]);
        if($numFiles == 0){
            header("location:?c=main&m=image&msg=imagen_vacia");
        
        }else{

                for($i= 0; $i < $numFiles; $i++){

                    $type = $_FILES["imagen"]["type"][$i];
                    $name = $_FILES["imagen"]["name"][$i];
                    $tmp_name = $_FILES["imagen"]["tmp_name"][$i];
                     
                    $img = basename($name);
                    $ruta = "images/user".$_SESSION["id_user"];
                    $rutadb = $ruta."/".$img;
                      
                    $img_repeat = $this->model->verificar_imagen($rutadb);
                    if($img_repeat >= 1 ){
                        header("location:?c=main&m=image&msg=imagen_repetida");
                    }else{
                     if($type == "image/jpeg" ||
                        $type == "image/png" ||
                        $type == "image/pjpeg" ||
                        $type == "image/pjpeg" ||
                        $type == "image/gif"){

                           if(!file_exists($ruta)){
                               mkdir($ruta,0777,true);
                                 if(file_exists($ruta)){
                                    move_uploaded_file($tmp_name,$rutadb);
                                 } 
                           }else{
                                  move_uploaded_file($tmp_name,$rutadb);
                                 }


                            $response =  $this->model->insert($_POST,$rutadb);
                            if($response){
                                if($i == ($numFiles - 1)){
                                   header("location:?c=main&m=image&msg=image_agregada");
                                  }
                            }else{
                                header("location:?c=main&m=image&msg=image_fail");
                            }


                         }else{
                             header("location:?c=main&m=image&msg=extexcion_no_permitida");
                         }    
                       
                }
             }
        }

     }

     public function delete()
     {
         $response = $this->model->delete($_REQUEST["id"]);

         if($response){
            header("location:?c=main&m=index&msg=img_deleted");
         }else{
            header("location:?c=main&m=index&msg=img_dont_deleted");
         }
     }
}
?>