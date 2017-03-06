<?php $this->load->view('common/header') ?>


  <section class="content">



      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Eventos </h3>

          <div class="box-tools pull-right">
          <button type="button" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#newevent">Nuevo evento</button>
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">

			<table id="table-eventos" class="stripe hover display">
			    <thead>
			        <tr>
			            <th>id</th>
			            <th>Nombre</th>
			            <th>Fecha</th>
			            <th>Tipo cupo</th>
			            <th>opciones</th>
			        </tr>
			    </thead>
			    <tbody>
			    </tbody>
			</table>  

	      </div>
        <!-- /.box-body -->
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

 <div class="modal fade" id="newevent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo evento</h4>
      </div>
      <div class="modal-body">
			<form id="nuevo_evento"  method="post" >
			  <div class="form-group col-md-12">
			    <label for="exampleInputEmail1">Nombre</label>
			    <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" placeholder="nombre">
			  </div>
			  <div class="form-group col-md-6">
			    <label for="exampleInputPassword1">Fecha</label>
			    <input type="text" name="fecha" class="form-control" id="fechapicker" placeholder="">
			  </div>
			  
			  <div class="form-group col-md-6">
			    <label for="exampleInputPassword1">Hora</label>
			    <input type="text" name="hora" class="form-control" id="horapicker" placeholder="">
			  </div>
			  
			  <div class="form-group col-md-12">
			    <label for="exampleInputPassword1">Tipo de cupos</label>
					<select name="tipo" class="form-control">
					  <option value="1">Limitado</option>
					  <option value="2">Ilimitado</option>
					</select>	
			  </div>
			
			 <button type="submit" id="add_evento" class="btn btn-primary">Guardar</button>
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




 		<div class="modal fade" id="tipoentrada">
 			<div class="modal-dialog" role="document">
 				<div class="modal-content">
 					<div class="modal-header">
 						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 							<span aria-hidden="true">&times;</span>
 							<span class="sr-only">Close</span>
 						</button>
 						<h4 class="modal-title">Tipos de entrada</h4>
 					</div>
 					<div class="modal-body">
 						<div class="box">
				 			<form id="nueva_entrada"  method="post" >
				
							  <div class="form-group col-md-6">
							    <label for="exampleInputPassword1">Nombre</label>
							    <input type="text" name="nombre" class="form-control"  placeholder="">
							  </div>
							  
							  <div class="cantidad_entrada form-group col-md-6">
							    <label for="exampleInputPassword1">Cantidad</label>
							    <input type="text" name="cantidad" class="form-control" placeholder="">
							  </div>
							 <div class="form-group col-md-4">
							    <label for="exampleInputPassword1">Precio</label>
							    <input type="text" name="precio" class="form-control"  placeholder="">
							  </div>
							  
							  <div class="form-group col-md-8">
							    <label for="exampleInputPassword1">descripcion</label>
							    <input type="text" name="desc" class="form-control" placeholder="">
							  </div>
							
							 <button type="submit" id="add_entrada" class="btn btn-primary">Añadir nuevo</button>
							</form>
						</div>
 						<div id="tipos_entradas_div">
 							<table id="table-entrada" class="stripe hover display">
							    <thead>
							        <tr>
							            <th>id</th>
							            <th>cantidad</th>
							            <th>nombre</th>
							            <th>precio</th>
							            <th>descripcion</th>
							            <th>opciones</th>
							        </tr>
							    </thead>
							    <tbody>
							    </tbody>
							</table>  
 						</div>
 					</div>
 					<div class="modal-footer">
 						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
 					</div>
 				</div><!-- /.modal-content -->
 			</div><!-- /.modal-dialog -->
 		</div><!-- /.modal -->




 		<div class="modal fade" id="vendidas">
 			<div class="modal-dialog" role="document">
 				<div class="modal-content">
 					<div class="modal-header">
 						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 							<span aria-hidden="true">&times;</span>
 							<span class="sr-only">Close</span>
 						</button>
 						<h4 class="modal-title">Entradas vendidas</h4>
 					</div>
 					<div class="modal-body">
 						<div class="box">
			
 							<table id="table-vendidas" class="stripe hover display">
							    <thead>
							        <tr>
							            <th>Entrada</th>
							            <th>Usuario</th>
							            <th>Email</th>
							            <th>Fecha</th>
							        </tr>
							    </thead>
							    <tbody>
							    </tbody>
							</table>  
 					</div>
 					<div class="modal-footer">
 						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
 					</div>
 				</div><!-- /.modal-content -->
 			</div><!-- /.modal-dialog -->
 		</div><!-- /.modal -->





    </section>



<?php $this->load->view('common/footer') ?>