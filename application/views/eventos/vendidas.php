<?php $this->load->view('common/header') ?>

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

			<table id="table-vendidas" class="stripe hover display">
			    <thead>
			        <tr>
                  <th>Evento</th>
                  <th>Entrada</th>
                  <th>Usuario</th>
			            <th>Fecha</th>
			        </tr>
			    </thead>
			    <tbody>
			    </tbody>
			</table>  

	      </div>
        <!-- /.box-body -->
        <!-- /.box-footer-->
      </div>


<?php $this->load->view('common/footer') ?>
