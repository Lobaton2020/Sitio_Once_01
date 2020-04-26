			<!-- Header -->

            <header id="header">

<div class="content">
    <div class="inner">
        <h1>Galeria Imagenes 11-01</h1>
        <p>Esta es una pequeña muestra de diferentes imagenes, es decir una<br> galeria de imagenes del grado once, en el año 2019.</p>
    </div>
</div>
<nav>
    <ul>
        <li><a href="#login">Iniciar Sesion</a></li>
        <li><a href="#register">Registarse</a></li>
        <li><a href="">:)</a></li>
    </ul>
</nav>
</header>















<!-- Main -->
<div id="main">
<!-- inicio de sesion -->
    <article id="login">
        <h2 class="major">Inicio de Sesion</h2>
        <div style="color:red;margin-top:-20px;margin-bottom:10px">
          <?php
                 if(isset($_GET["msg"]) && $_GET["msg"] == "fail_login"){
                       echo "Error de autenticacion.";
                }else if(isset($_GET["msg"]) && $_GET["msg"] == "campos_vacios"){
                       echo "Por favor llenar todos los campos.";
                }
               
          ?>
          </div>
          <div style="color:green;margin-top:-20px;margin-bottom:10px">
          <?php
                if(isset($_GET["msg"]) && $_GET["msg"] == "logout"){
                       echo "Sesion cerrada de forma correcta.";
                }
               
          ?>
          </div>
        <form method="post">
           <input type="hidden" name="c" value="auth">
           <input type="hidden" name="m" value="login">
            <div class="fields">
                <div class="field">
                    <label for="correo">Correo</label>
                    <input type="email" name="correo" id="correo" autocomplete="on" value = "<?php echo isset($_GET["correo"]) ?$_GET["correo"] :"" ;?>" placeholder="Correo electronico" autofocus />
                </div>
                <div class="field">
                    <label for="clave">Contraseña</label>
                    <input type="password" name="clave" id="clave" placeholder="Password" required/>
                </div>
            </div>
            <ul class="actions">
                <li><input type="submit" value="Iniciar Sesion" class="primary" /></li>
                <li>
                <br>&nbsp;&nbsp;
                <a href="#forgot_password" class="primary" style="font-size:20px">¿Olvidaste tu contraseña?</a>
                </li>
                <li>
                <br>&nbsp;&nbsp;
                <a href="?c=main&m=index" class="primary">Atras</a>
                </li>
            </ul>
        </form>
    </article>
<!-- registro de un nuevo usuario  -->















<article id="register">
<h2 class="major">Registrate</h2>
<div style="color:red;margin-top:-20px;margin-bottom:10px">
<?php
      if(isset($_GET["msg"]) && $_GET["msg"] == "frase_erronea"){
             echo "La frase de verificacion es erronea.<br>";
      }else if(isset($_GET["msg"]) && $_GET["msg"] == "fail_save"){
             echo "Error en el momento de guardar los datos.";
      }else if(isset($_GET["msg"]) && $_GET["msg"] == "campos_vacios"){
             echo "Por favor llenar todos los campos.";
      }else if(isset($_GET["msg"]) && $_GET["msg"] == "correo_exists"){
        echo "Ya existe un correo con el mismo nombre registrado. Busca otro !";
 }
     
?>
</div>
<div style="color:green;margin-top:-20px;margin-bottom:10px">
<?php
      if(isset($_GET["msg"]) && $_GET["msg"] == "user_saved"){
             echo "Usuario agregado correctamente. Ahora puedes iniciar sesion!";
      }
     
?>
</div>
<form method="post">
        
          <input type="hidden" name="c" value="auth">
          <input type="hidden" name="m" value="save">
          <input type="hidden" name="estado" value=1 >
    <div class="fields">
        <div class="field">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" value = "<?php echo isset($_GET["nombre"]) ?$_GET["nombre"] :"" ;?>" placeholder="Primer nombre" autofocus />
        </div>
        <div class="field">
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" id="apellido" value = "<?php echo isset($_GET["apellido"]) ?$_GET["apellido"] :"" ;?>" placeholder="Primer apellido" />
        </div>
        <div class="field">
            <label for="correo">Correo</label>
            <input type="email" name="correo" id="correo" value = "<?php echo isset($_GET["correo"]) ?$_GET["correo"] :"" ;?>" placeholder="Correo electronico" />
        </div>
        <div class="field">
            <label for="clave">Contraseña</label>
            <input type="password" name="clave" id="clave" placeholder="Password" >
        </div>
        <div class="field">
            <label for="frase">Frase de verificacion</label>
            <input type="password" name="frase" id="frase" placeholder="Escribe la frase" />
        </div>
    </div>
    <ul class="actions">
        <li><input type="submit" value="Registrarme" class="primary" /></li>
        <li><input type="reset" value="Reset" /></li>
        <br>&nbsp;&nbsp;
                <a href="?c=main&m=index" class="primary">Atras</a>
    </ul>
</form>
</article>
<!-- pagina de olvido de contraseña -->
<article id="forgot_password">
<h2>Recuperacion de Contraseña</h2><br>
<div style="color:red;margin-top:-20px;margin-bottom:10px">
<?php
      if(isset($_GET["msg"]) && $_GET["msg"] == "email_fail"){
             echo "Por favor ingresa un correo registrado..";
      }
     
?>
</div>
<div style="color:green;margin-top:-20px;margin-bottom:10px">
<?php
      if(isset($_GET["msg"]) && $_GET["msg"] == "new_pass"){
             echo "Ingresa con la siguiente clave <span style='color:#eeeeee'>\"{$_GET['token']}\"</span>, y luego cambiala inmediatamente apenas ingreses..";
      }
     
?>
</div>
<form method="post">
        
          <input type="hidden" name="c" value="auth">
          <input type="hidden" name="m" value="forgot_pass">
    <div class="fields">
        <div class="field">
            <label for="correo">Correo</label>
            <input type="email" name="correo" id="correo" placeholder="Correo electronico " />
        </div>
    </div>
    <ul class="actions">
        <li><input type="submit" value="Recuperar Contraseña" class="primary" /></li>

        <br>&nbsp;&nbsp;
                <a href="#login" class="primary">Atras</a>
    </ul>
</form>
</article>
    </article>

</div>
