<?php
require_once "models/User.php";
require_once "helper/getDate.php";
class UserController
{
   private $model;

   public function __construct()
   {
    if(empty($_SESSION["id_user"]) || !isset($_SESSION["id_user"])){
        header("location:?msg=session_expired&type=info");

    }

     $this->model = new User();
   } 
  
    
   public function index()
   {   

        $response = $this->model->getone($_SESSION["id_user"]);

        $contenido = "user/usuarioProfile.php";    
        require_once "views/template/main/content.php"; 
        
       
   }



   public function update()
   {
     if(!empty($_POST["nombre"]) &&
        !empty($_POST["apellido"]) &&
        !empty($_POST["correo"]) &&
        !empty($_POST["clave"])){
                $verificar_correo = $this->model->verificar_correo_update($_POST["correo"],$_SESSION["correo_user"]);
                if($verificar_correo >= 1){
                header("location:?c=user&m=index&msg=correo_exists");
              }else{
              $response = $this->model->update($_POST);
               if($response){
                     header("location:?c=user&m=index&msg=user_updated");
                }else{
                     header("location:?c=user&m=index&msg=user_fail_updated");
             
               }
            }
      }else{
          header("location:?c=user&m=index&msg=campos_vacios");
      }
   }


}

?>