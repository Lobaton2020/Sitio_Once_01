<?php

class Imagen
{
    private $dbh;
    private $fecha;
    
    public function __construct()
    { 
       $this->fecha = date("Y-m-d G:i:s");
       $this->dbh = Database::connection(); 
       
    }

    
    
    public function getall($num)
    {
      try{

      $size = 12;
      $page = 1;
      if(isset($num)):
           $page = $num;
          endif;
          
          $this->dbh->exec("set names utf8mb4");
         $stmt = $this->dbh->prepare("SELECT * FROM Listado_Imagenes");
         $stmt->execute();
         $rows = $stmt->rowCount();
         
         $paginate = ceil($rows / $size);
         $page = $page > $paginate ? 1 :$page;
         $ini = ($page - 1) * $size; 
         $sql = "SELECT * FROM Listado_Imagenes limit $ini,$size";
         $stmt = $this->dbh->prepare($sql);
         $stmt->execute();
         $response = $stmt->fetchAll();
         return array($response,$page,$paginate);

        }catch(Exception $e){
          exit($e->getMessage());
        }
    }
    



    public function insert($data,$ruta)
    { 
     try{
          $stmt = $this->dbh->prepare("INSERT INTO Imagen values(?,?,?,?,?,?,?)");
          $stmt->execute(array(null,
                               $_SESSION["id_user"],
                               $ruta,
                               $data["titulo"],
                               $data["descripcion"],
                               1,
                               $this->fecha));
          return true;

         }catch(Exception $e){
           exit($e->getMessage());
         }
    }

    public function verificar_imagen($ruta)
    { 
     try{
          $stmt = $this->dbh->prepare("SELECT * FROM Imagen WHERE ruta_imagen = ?");
          $stmt->execute(array($ruta));
          return $stmt->rowCount();

         }catch(Exception $e){
           exit($e->getMessage());
         }
    }



    public function delete($id)
    {
      try{
        $stmt = $this->dbh->prepare("UPDATE Imagen SET estado_imagen = 0 WHERE id_imagen_PK = ?");
        $stmt->execute(array($id));
        return true;
      }catch(Exception $e){
        exit($e->getMessage());
      }
    }

    public function get_number()
    {
      try{
        $stmt = $this->dbh->prepare("SELECT * FROM Imagen where estado_imagen = 1");
        $stmt->execute();
        return $stmt->rowCount();
      }catch(Exception $e){
        exit($e->getMessage());
      }
    }

  }
?>