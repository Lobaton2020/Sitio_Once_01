<div class="container">
<div class="table-responsive">
<h2 class="mt-4 text-center">Listado de usuarios registrados</h2>
<table class="table table-dark ">
  <thead>
    <tr>
      <th>#</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Correo</th>
      <th>Rol</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($rows as $row): ?>
      <tr>
        <th><?php echo $row->id_usuario_PK; ?></th>
        <td><?php echo $row->nombre_usuario; ?></td>
        <td><?php echo $row->apellido_usuario; ?></td>
        <td><?php echo $row->correo_usuario; ?></td>
        <td><?php echo $row->rol_usuario == 1 ? "Student" : "Admin"; ?></td>
      </tr>
  <?php endforeach;?>
  </tbody>
</table>
</div>
</div>