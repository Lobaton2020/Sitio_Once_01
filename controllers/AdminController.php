<?php
require_once "helper/getDate.php";
require_once "models/User.php";
require_once "models/Imagen.php";
class AdminController
{   
    private $model;
       
    public function __construct(){
        if(empty($_SESSION["id_user"]) || !isset($_SESSION["id_user"])){
            header("location:?c=auth");
         }  
        if(empty($_SESSION["rol_user"]) || $_SESSION["rol_user"] != 2){
           header("location:?c=auth");
        }  
         $this->model = new User();   
         $this->model_img = new Imagen();   
     
    }
       
       
    public function index()
    {
        $rows =  $this->model->getall();
        $contenido = "admin/userList.php";    
        require_once "views/template/main/content.php"; 

     
    }

     public function login_history()
     {
         $rows = $this->model->loginuserhistory();

         $contenido = "admin/loginuserList.php";    
         require_once "views/template/main/content.php"; 
     }

     public function ajax_get_number_image()
     {
         echo $this->model_img->get_number();

     }
}
?>