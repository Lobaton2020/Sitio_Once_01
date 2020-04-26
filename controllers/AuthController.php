<?php

require_once "models/User.php";

class AuthController
{    
    private $model;

    public function __construct()
    {
        $this->model = new User();
    }


    public function index()
    {
         session_destroy();
         require_once "views/template/login/header.php";
         require_once "views/login/content.php";
         require_once "views/template/login/footer.php";
    }
    

    public function login()
    {
      $dato = "&correo={$_POST["correo"]}#login";
      if( !empty($_POST["correo"]) &&
          !empty($_POST["clave"])){  

              $correo = filter_var($_POST["correo"],FILTER_SANITIZE_EMAIL);
              $response =  $this->model->login($correo,$_POST["clave"]);
              if($response){
                  header("location:?c=main&m=index");
                }else{
                  header("location:?msg=fail_login".$dato);
               }
      }else{
          header("location:?msg=campos_vacios".$dato);
      }
    }



    public function save()
    {
        $datos = "&nombre={$_POST["nombre"]}&apellido={$_POST["apellido"]}&correo={$_POST["correo"]}#register";
        
        if(!empty($_POST["nombre"]) &&
           !empty($_POST["apellido"]) &&
           !empty($_POST["correo"]) &&
           !empty($_POST["clave"]) &&
           !empty($_POST["frase"])){
               
             if($_POST["frase"] == "elemental"){
                     $verificar_correo = $this->model->verificar_correo($_POST["correo"]);
                     if($verificar_correo >= 1){
                            header("location:?msg=correo_exists#register");
                      }else{
                            $response  = $this->model->insert_user($_POST);
                            if($response){
                                  header("location:?msg=user_saved#register");
                             }else{
                                  header("location:?msg=fail_save".$datos);
                          } 
                     }
                 }else{
                header("location:?msg=frase_erronea".$datos);
                }
         }else{
             header("location:?msg=campos_vacios".$datos);
         }
    }

    public function forgot_pass()
    { 
        $pass = random_int(111111,999999);
        
        if(isset($_POST["correo"])){
           $resp = $this->model->forgot($pass,$_POST["correo"]);
            if($resp){
                header("location:?msg=new_pass&token={$pass}#forgot_password");
              }else{
                header("location:?msg=email_fail#forgot_password");
              }

        }
   
    }
}


?>