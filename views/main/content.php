
<!-- Wrapper -->
<div id="wrapper">
<!-- Main -->
    <div id="main">
         <?php foreach($images as $image): ?>
         <article class="thumb">
             <a href="<?php echo $image->ruta_imagen; ?>" class="image" ><img src="<?php echo $image->ruta_imagen; ?>" alt="" /></a>
              <h2><?php echo $image->titulo_imagen; ?></h2>
              <p style="margin-bottom:0px"><?php echo $image->descripcion_imagen; ?></p>
              <span style="margin-top:-30px" class="small">Agregado por <b><?php echo ucwords($image->nombre_usuario) ." ".ucwords($image->apellido_usuario);?></b> el dia <?php echo getDatetime($image->fecha_insercion_imagen);?></span>
                <?php if($image->id_usuario_FK == $_SESSION["id_user"]):?>
                  <a class="eliminacion" onclick="javascript:return confirm('¿Estas seguro de eliminar esta imagen?');"
                   href="?c=main&m=delete&id=<?php echo $image->id_imagen_PK;?>" class="btn btn-outline-default" 
                   title="Eliminar" data-toggle="tool"> &nbsp;<i class="fas fa-trash"></i></a>
                <?php endif; ?>
          </article>
        <?php endforeach; ?>

        </div>
        </div>
  <div class="table-responsive">
  <table style="margin-bottom:0px" table="table">
  <tr>
  <td>
    <nav aria-label="" class="float-right">
                <ul class="pagination">
          <?php if($page != 1){ ?>
                 <li class="page-item ">
                  <a class="page-link" href="?c=main&m=index&num=<?php echo $page-1; ?>" tabindex="-1" aria-disabled="true">Previous</a>
                  </li>
          <?php }else{ ?>
            <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                  </li>
        <?php }
             for($i = 1; $i <= $paginate;$i++){
                if($i != $page){
          ?>
                 <li class="page-item"><a class="page-link" href="<?php echo "?c=main&m=index&num={$i}"; ?>"><?php echo $i;?></a></li>

         <?php  }else{ ?>

                   <li class="page-item active" aria-current="page"><a class="page-link" href="<?php echo "?c=main&m=index&num={$i}"; ?>"><?php echo $i;?></a></li>
         <?php          
                   }
              }
           if($page != $paginate ){
          ?>
              <li class="page-item">
                <a class="page-link" href="?c=main&m=index&num=<?php echo $page+1; ?>">Next</a>
              </li>
           <?php }else{ ?>

            <li class="page-item disabled">
                <a class="page-link" href="">Next</a>
            </li>
           <?php }?>
            </ul>
          </nav>

             </td>
             </tr>
          </table>
        </div>