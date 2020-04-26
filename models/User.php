<?php

class User
{
    private $dbh;
    private $fecha;
    
    public function __construct()
    { 
       $this->fecha = date("Y-m-d G:i:s");
       $this->dbh = Database::connection(); 
       
    }

    public function login($correo,$clave)
    {
      try{
           $stmt = $this->dbh->prepare("SELECT * FROM Usuario where correo_usuario = ?");
           $stmt->execute(array($correo));
           $response = $stmt->fetch();

           if(password_verify($clave, $response->clave_usuario)){

               $_SESSION["id_user"] = $response->id_usuario_PK;
               $_SESSION["name_user"] = $response->nombre_usuario; 
               $_SESSION["lastname_user"] = $response->apellido_usuario; 
               $_SESSION["correo_user"] = $response->correo_usuario; 
               $_SESSION["state_user"] = $response->estado_usuario; 
               $_SESSION["rol_user"] = $response->rol_usuario; 
               $_SESSION["date_user"] = $response->fecha_creacion_usuario; 

                       // realiza un historia de cuando un usuario inica sesion
               $fecha = date("Y-m-d"); 
               $hora = date("G:i:s"); 
        
               $stmt = $this->dbh->prepare("INSERT INTO Registro_Login  VALUES ( ?,?,?,? )");
               $stmt->execute(array(null,
                                    $response->id_usuario_PK,
                                    $fecha,
                                    $hora));
               return true;
           }else{
       
            return false;
       }
      }catch(Exception $e){
          exit($e->getMessage());
      }
    }
    
    public function getall()
    {
      try{
         $stmt = $this->dbh->prepare("SELECT * FROM Usuario");
         $stmt->execute();
         $rows = $stmt->fetchAll();
          return $rows;

        }catch(Exception $e){
          exit($e->getMessage());
        }
    }




    public function getone($id)
    {
      try{
        
        $stmt = $this->dbh->prepare("SELECT * FROM Usuario WHERE id_usuario_PK = ? AND estado_usuario = 1");
        $stmt->execute(array($id));
        return  $stmt->fetch();

       }catch(Exception $e){
         exit($e->getMessage());
       }
    }




    public function insert_user($data)
    { 
     try{
          $rol = $data["correo"] == "andrespipe021028@gmail.com" ? 2 : 1;
          $clave =  password_hash($data["clave"],PASSWORD_BCRYPT);
          $stmt = $this->dbh->prepare("INSERT INTO Usuario values(?,?,?,?,?,?,?,?)");
          $stmt->execute(array(null,
                               $data["nombre"],
                               $data["apellido"],
                               $data["correo"],
                               $clave,
                               1,
                               $rol,
                               $this->fecha));
          return true;

         }catch(Exception $e){
           exit($e->getMessage());
         }
    }

    public function verificar_correo($correo)
    { 
     try{
          $stmt = $this->dbh->prepare("SELECT * FROM Usuario WHERE correo_usuario = ?");
          $stmt->execute(array($correo));
          return $stmt->rowCount();

         }catch(Exception $e){
           exit($e->getMessage());
         }
    }



    public function verificar_correo_update($correo_nuevo,$correo_viejo)
    { 
     try{
          $stmt = $this->dbh->prepare("SELECT * FROM Usuario WHERE correo_usuario = ? and correo_usuario != ?");
          $stmt->execute(array($correo_nuevo,$correo_viejo));
          return $stmt->rowCount();

         }catch(Exception $e){
           exit($e->getMessage());
         }
    }


    public function update($data)
    {   
        $stmt = $this->dbh->prepare("SELECT clave_usuario from Usuario where id_usuario_PK = ?");
        $stmt->execute(array($_SESSION["id_user"]));
        $response = $stmt->fetch();

        if($data["clave"] !== $response->clave_usuario){
               
               $clave = password_hash($data["clave"],PASSWORD_BCRYPT);
               $stmt = $this->dbh->prepare("UPDATE Usuario SET clave_usuario = ? WHERE id_usuario_PK = ?");
               $stmt->execute(array($clave,$_SESSION["id_user"]));
          }
        try{
          $sql = "UPDATE Usuario SET nombre_usuario = ?,
                                     apellido_usuario = ?,
                                     correo_usuario = ?
                             WHERE id_usuario_PK = ?";



            $stmt = $this->dbh->prepare($sql);
            $stmt->execute(array($data["nombre"],
                                 $data["apellido"],
                                 $data["correo"],
                                 $_SESSION["id_user"]));
          
          return true;

        }catch(Exception $e){
          exit($e->getMessage());
        }
    }




//     public function delete($id)
//     {
//       $ruta = "assets/img/user".$id;
//           if(file_exists($ruta)){

//               $sql = "SELECT foto_usuario from Usuario where id_usuario_PK = ?";
//               $stmt = $this->dbh->prepare($sql);
//               $stmt->execute(array($id));
//               $foto = $stmt->fetch();   
//               $ruta_e = $foto->foto_usuario;
          
//             if($ruta_e != "assets/img/user/avatar.png"){              
                
//                  if(unlink($ruta_e)){
//                       rmdir($ruta); 
//                    }
//              }
//           }
//       try{
//         $sql = "UPDATE Usuario SET inactivacion_usuario = 1 WHERE id_usuario_PK = :id";
//         $stmt = $this->dbh->prepare($sql);
//         $stmt->bindParam(":id",$id);
//         $stmt->execute();
//         return true;
//       }catch(Exception $e){
//         exit($e->getMessage());
//       }
//     }

//     public function tipoDocumento()
//     { 
//       try{
//         $sql = "SELECT * FROM Tipo_Documento";
//         $stmt = $this->dbh->prepare($sql);
//         $stmt->execute();
//         return $stmt->fetchAll();

//       }catch(Exception $e){
//         exit($e->getMessage());
//       }
//     }

    public function forgot($pass,$correo)
    {
 try{
        $stmt = $this->dbh->prepare("SELECT * FROM Usuario where correo_usuario = ?");
        $stmt->execute(array($correo));
        $correo_exist = $stmt->fetch();
        if($correo_exist){
             $stmt = $this->dbh->prepare("UPDATE Usuario set clave_usuario = ? where correo_usuario = ?");
             $stmt->execute(array(password_hash($pass,PASSWORD_BCRYPT),$correo));
             return true;
        }else{
          return false;
        }
       }catch(Exception $e){
         exit($e->getMessage());
       }
    }

  public function loginuserhistory()
  {
    try{
    $stmt = $this->dbh->prepare("SELECT * FROM Historial_Registro_Login");
    $stmt->execute();
    return $stmt->fetchAll();

   }catch(Exception $e){
     exit($e->getMessage());
   }
  }

  }
?>