<br>
<div id="main">
    <div class="container">
    <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
    <div class="text-center">
      <h2>Ingresa una imagen</h2>
    </div>
    <div style="color:red;margin-top:-20px;margin-bottom:10px">
          <?php
                 if(isset($_GET["msg"]) && $_GET["msg"] == "extexcion_no_permitida"){
                       echo "La extencion de las imagenes no esta permitida.";
                }else if(isset($_GET["msg"]) && $_GET["msg"] == "imagen_vacia"){
                       echo "Por favor agrega una imagen.";
                }else if(isset($_GET["msg"]) && $_GET["msg"] == "image_fail"){
                    echo "Lo sentimos la imagen no pudo ser agregada.";
                }else if(isset($_GET["msg"]) && $_GET["msg"] == "imagen_repetida"){
                 echo "Ya existe una imagen guardada con el mismo nombre.";
                }
               
          ?>
          </div>
          <div style="color:green;margin-top:-20px;margin-bottom:10px">
          <?php
                if(isset($_GET["msg"]) && $_GET["msg"] == "image_agregada"){
                       echo "La imagen ó las imagenes fueron guardadas.";
                }
               
          ?>
          </div>
    <form method="post" enctype="multipart/form-data">

           <input type="hidden" name="c" value="main">
           <input type="hidden" name="m" value="save_image">
            <div class="fields">
                <div class="field">
                    <label for="correo">Titulo  <small>(opcional)</small></label>
                    <input type="text" name="titulo" id="correo"  placeholder="Titulo de la imagen" autofocus />
                </div>
                <div class="field">
                    <label for="clave">Descripcion <small>(opcional)</small></label>
                    <textarea data-emojiable="true" data-emoji-input="unicode" name="descripcion" rows="6" placeholder="Breve descripcion"></textarea>
                </div>
                <div class="field">
                    <label for="clave">Seleccciona una  ó mas Imagenes</label>
                    <div id="file" class=""> 
                      <p class="txt text-muted">Agregar Imagen. Click <a href="#"> Aqui.</a></p>
                      <input type="file" name="imagen[]" id="imagen" multiple accept=".png,.jpg,.jpeg,.gif,.svg"  required>
                   </div>
                </div>
            </div>
            <div class="field">
                <input style="width:100%" type="submit" value="Guardar Imagen" class="primary" />
                <br>
                <a href="?c=main&m=index" class="primary" >Atras</a>
            </div>
        </form>
        </div>
       <div class="col-md-2"></div>
      </div>
    </div>
</div>