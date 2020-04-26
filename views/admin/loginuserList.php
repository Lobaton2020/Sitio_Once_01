<div class="container">
<div class="table-responsive">
<h2 class="mt-4 text-center">Historial de ingreso</h2>
       <table class="table table-dark">
        <thead>
          <tr>
          <tr>
             <th>#</th>
             <th>Nombre</th>
             <th>Apellido</th>
             <th>Fecha</th>
          </tr>
        </thead>
        </footd>
       <tbody>
        <?php foreach($rows as $row): ?>
             <tr>
             <td><?php echo $row->id_registro_login;; ?></td>
             <td><?php echo ucwords($row->nombre_usuario); ?></td>
             <td><?php echo ucwords($row->apellido_usuario); ?></td>
             <td><?php echo getDatetime_login_history($row->fecha,$row->hora); ?></td>
             </tr>      
        <?php endforeach; ?>
       </tbody>
     </table>
     </div>
</div>