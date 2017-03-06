<?php $this->load->view('common/header') ?>


  <section class="content">



      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Verificar tickets </h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">

			<form id="verificar_ticket"  method="post" >
			
			  <div class="input-group col-md-6">
                <input type="text" name="ticket" class="form-control">
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-info btn-flat"><i class="fa fa-search"></i> Verificar</button>
                    </span>
          </div>
	

			</form>




	      </div>
        <!-- /.box-body -->
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->






    </section>



<?php $this->load->view('common/footer') ?>