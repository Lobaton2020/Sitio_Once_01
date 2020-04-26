
<nav style="background-color:#3b5998"  class="navbar navbar-expand navbar-dark static-top">
<a class="navbar-brand mr-5" href="?c=main">Recuerdos 1101</a>
<span class="ml-5"></span>

<!-- Navbar Search -->

<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
  <div class="input-group">
    <span class="text-light ml-2"><i class="fas fa-user"> </i>&nbsp;&nbsp;<?php echo ucwords($_SESSION["name_user"])." ".ucwords($_SESSION["lastname_user"]); ?></span>
    </div>
 </form> 

<!-- Navbar -->

<ul class="navbar-nav ml-auto ml-md-0">
<?php if($_SESSION["rol_user"] == 2):?>
  <li class="nav-item dropdown no-arrow">
    <a class="nav-link " href="#" id="usersDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-cogs"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="usersDropdown">
    <h6 class="dropdown-header">Herramientas</h6>
      <a class="dropdown-item" href="?c=admin&m=index"><i class="fas fa-user"></i> User List</a>
      <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="?c=admin&m=login_history"><i class="fas fa-history"></i> Login History</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#numero_imagenes"><i class="fas fa-sort-numeric-up"></i> Number Images</a>
    </div>
  </li>
  <?php endif; ?>
  <li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
    <h6 class="dropdown-header">Acciones</h6>
    <a class="dropdown-item" href="?c=main&m=image"> <i class="fas fa-plus-circle"></i> Añadir Imagen</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="?c=user&m=index"> <i class="fas fa-wrench"></i> Ver mi Perfil</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="?c=auth"><i class="fas fa-sign-out-alt"> </i> Cerrar Sesion</a>
    </div>
    </li>
</ul>
</nav>
<!-- Modal del numero de imagenes -->
<div class="modal fade" id="numero_imagenes" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-dark" id="exampleModalCenterTitle">Registros de imagenes</h3>
      </div>
      <div class="modal-body">

       <h4 class="text-dark">Actualmente hay <span id="number"></span>.</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
