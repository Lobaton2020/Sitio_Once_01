<?php
// Este el el FrontController
    // iniciamos las variables de sesion
    date_default_timezone_set('America/Bogota');
    session_start();
    // traemos los archivos para iniciar la base de datos

    require_once "models/Database.php";   

    // damos calor automatico al controlador
    $controller = "Auth";

    if(!isset($_REQUEST["c"])){
       
         require_once "controllers/{$controller}Controller.php";
         $controller = ucwords($controller) . "Controller";
         $controller = new $controller();
         $controller->index();
    }else{

        $controller = ucwords($_REQUEST["c"])."Controller";
        $method = isset($_REQUEST["m"]) ? $_REQUEST["m"] : "index";

      //verificamos si el archivo o la carpeta existe   
        if(file_exists("controllers/{$controller}.php")){
              // llamamos el archivo del controlado
              require_once "controllers/{$controller}.php";

             if(class_exists($controller)){
                  // llamamos la clase del controlador
                  $controller = new $controller();

                   if(method_exists($controller,$method)){ 
                       // llamamos el metodo de la clase del controlador
                       call_user_func(array($controller,$method));

                   }else{
                    header("location:?msg=page_not_found&type=danger");
                   } 
            }else{
            header("location:?msg=page_not_found&type=danger");
            } 
        }else{
            header("location:?msg=page_not_found&type=danger");
        }
         
    }

?>