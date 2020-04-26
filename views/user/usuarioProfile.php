<br>
<div id="main">
    <div class="container">
    <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
    <div class="text-center">
      <h2>Actualiza tus datos</h2>
    </div>
    <div style="color:red;margin-top:-20px;margin-bottom:10px">
       <?php
      if(isset($_GET["msg"]) && $_GET["msg"] == "user_fail_updated"){
             echo "No se pudo actualizar!.<br>";
      }else if(isset($_GET["msg"]) && $_GET["msg"] == "campos_vacios"){
             echo "Por favor llenar todos los campos.";
      }else if(isset($_GET["msg"]) && $_GET["msg"] == "correo_exists"){
        echo "Ya existe un correo con el mismo nombre registrado. Busca otro correo!";
       }
     
       ?>
      </div>
      <div style="color:green;margin-top:-20px;margin-bottom:10px">
      <?php
            if(isset($_GET["msg"]) && $_GET["msg"] == "user_updated"){
                   echo "Datos actualizados correctamente.";
            }
           
      ?>
</div>
    <form method="post" enctype="multipart/form-data">

           <input type="hidden" name="c" value="user">
           <input type="hidden" name="m" value="update">
            <div class="fields">
                <div class="field">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $response->nombre_usuario; ?>"  autofocus  required/>
                </div>
                <div class="field">
                    <label for="apellido">Apellido</label>
                   <input type="text" name="apellido" id="apellido" value="<?php echo $response->apellido_usuario; ?>" require>
                </div>
                <div class="field">
                    <label for="correo">Correo</label>

                      <input type="email" name="correo" id="correo" value="<?php echo $response->correo_usuario; ?>" required>

                </div>
                <div class="field">
                    <label for="clave">Contraseña</label>
                      <input type="password" name="clave" id="clave" value="<?php echo $response->clave_usuario; ?>"  required>
                </div>
            </div>
            <div class="field">
                <input style="width:100%" type="submit" value="Actualizar Perfil" class="primary" />
                <br>
                <a href="?c=main&m=index" class="primary" >Atras</a>
            </div>
        </form>
        </div>
       <div class="col-md-2"></div>
      </div>
    </div>
</div>