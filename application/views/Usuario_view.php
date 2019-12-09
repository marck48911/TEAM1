<script type="text/javascript">
document.getElementById("breadcrumb_items").innerHTML +=  
      '<li class="breadcrumb-item">Usuarios</li>';
</script>
            <h3>Usuarios
               <br>
               <small>Edite los usuarios</small>
            </h3>

              <div class="panel panel-default">
                <div class="panel-heading">Ingresar nuevo usuario</div>
                <div class="panel-body">
                  <div class="form-group">
                    <input name="nombres" class="form-control"  maxlength="80"  type="text" placeholder="Nombres">
                  </div>
                  <div class="form-group">
                    <input name="primer_apellido" class="form-control"  maxlength="80" type="text" placeholder="Primer apellido">
                  </div>
                  <div class="form-group">
                    <input name="segundo_apellido" class="form-control"  maxlength="80" type="text" placeholder="Segundo apellido">
                  </div>
                  <div class="form-group">
                    <input name="email" class="form-control"  maxlength="140" type="text" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <input name="password" class="form-control"  maxlength="60"  type="Password" placeholder="Password">
                  </div>
                  <div class="row">
                    <div class="col-sm-3">
                      <select class="form-control" name="estado">
                        <option value="1">Estudiante</option>
                        <option value="2">Moderador</option>
                        <option value="3">Administrador</option>
                      </select>
                    </div>
                  </div>
                  <br/>
                <div>
                  <button id="btnAgregar" class="btn btn-default" type="submit">Agregar</button>
                </div>
              </div>
      <script type="text/javascript">

    $("#btnAgregar").click(function(e){

       e.preventDefault();
    
       var nombres = $("input[name='nombres']").val();
       var primer_apellido = $("input[name='primer_apellido']").val();
       var segundo_apellido = $("input[name='segundo_apellido']").val();
       var email = $("input[name='email']").val();
       var password = $("input[name='password']").val();
       var estado = $("select[name='estado']").val();


        $.ajax({

           url: "<?php echo base_url(); ?>index.php/usuario/agregarbd_ajax",
           type: "POST",
           data: {nombres: nombres, primer_apellido: primer_apellido, segundo_apellido: segundo_apellido,
            email: email, password: password, estado: estado},

           error: function() {

              alert('Something is wrong adding ' + nombres);// + ' ' + descripcion + ' ' + this.url);

           },

           success: function($id_usuario) {
              if($id_usuario>0)
             {
             
              $('input[type="text"],textarea').val('');
              
              var tipoUsuario = ''; 
              var rowCount = document.getElementById('tabla').rows.length;
              
              if(estado==1)
              {
                tipoUsuario = 'Estudiante';
              }
              else if(estado==2)
              {
                tipoUsuario = 'Moderador';
              }
              else if(estado==3)
              {
                tipoUsuario = 'Administrador';
              }
              
              
              //$("tbody").append("<tr><td>"+rowCount+"</td><td>"+nombre_curso+"</td><td>"+descripcion+"</td><td>"+nivel+"</td><td></td><td></td><td></td></tr>");
              $("tbody").append("<tr><td>"+rowCount+"</td><td>"+nombres+"</td><td>"+primer_apellido+"</td><td>"+segundo_apellido+"</td><td>"+email+"</td><td>"+tipoUsuario+"</td>"+
                    '<td>'+ 
                        '<?php echo form_open_multipart('usuario/modificarusuario'); ?>'+
                        '<input type="hidden" name="idusuario" value="'+$id_usuario+'" >'+
                        '<button type="submit" class="btn btn-xs btn-default "><div>'+
                          '<em class="fa fa-edit"></em>'+
                          '<span class="text-muted"></span>'+
                       '</div></button>'+
                       '<?php echo form_close();?>'+
                    '</td>'+

                   '<td>'+
                       '<?php echo form_open_multipart('usuario/eliminarbd'); ?>'+
                       '<input type="hidden" name="idusuario" value="'+$id_usuario+'" >'+
                       '<button type="submit" class="btn btn-xs btn-default"><div>'+
                          '<em class="fa fa-times"></em>'+
                          '<span class="text-muted"></span>'+
                       '</div></button>'+
                       '<?php echo form_close();?>'+
                    '</td>'+

                  '</tr>');
              //alert('Record added successfully: ' + nombres + ' con id ' + $id_usuario);// + ' ' + descripcion + ' ' + this.url);
           }
            else
           {
                 alert($id_usuario);
           }
         }
        });
    });
</script>

    <div class="row">
       <div class="col-lg-12">
          <div class="panel panel-default">
             <div class="panel-heading">Usuarios</div>
             <div class="panel-body">
                <div class="table-responsive">
                   <table class="table" id="tabla">
                      <thead>
                         <th>#</th>
                         <th>Nombres</th>
                         <th>Primer apellido</th>
                         <th>Segundo apellido</th>
                         <th>Email</th>
                         <th>Tipo de usuario</th>
                         <th>Editar</th>
                         <th>Eliminar</th>
                      </thead>
                      <tbody>
          <?php
          $cont=1;
          foreach ($usuarios->result() as $row )
          {
          ?>
          <tr>
            <td><?php echo $cont ; ?> </td>
            <td><?php echo $row->nombres;?> </td>
            <td><?php echo $row->primer_apellido;?></td>
            <td><?php echo $row->segundo_apellido;?></td>
            <td><?php echo $row->email;?></td>
            <td><?php if($row->estado==1)echo 'Estudiante'; if($row->estado==2)echo 'Moderador';if($row->estado==3)echo 'Administrador';?></td>
                <td>
                   <?php echo form_open_multipart('usuario/modificarusuario'); ?>
                   <input type="hidden" name="idusuario" value="<?php echo $row->idusuario;?>" >
                   <button type="submit" class="btn btn-xs btn-default "><div >
                      <em class="fa fa-edit"></em>
                      <span class="text-muted"></span>
                   </div></button>
                   <?php echo form_close();?>
                </td>
               <td>
                   <?php echo form_open_multipart('usuario/eliminarbdusuario'); ?>
                   <input type="hidden" name="idusuario" value="<?php echo $row->idusuario;?>" >
                   <button type="submit" class="btn btn-xs btn-default"><div >
                      <em class="fa fa-times"></em>
                      <span class="text-muted"></span>
                   </div></button>
                   <?php echo form_close();?>
                </td>
          </tr>
          <?php
          $cont++;
          }
          ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
          <!-- END panel-->
      </div>
    </div>