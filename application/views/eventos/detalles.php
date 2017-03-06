<section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> <?php echo $detalles->name?>
            <h2 class="pull-right">Entrada: <?php echo $detalles->date?></h2>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Nombre</th>
              <th>Cantidad Disponible</th>
              <th>Descripcion</th>
              <th>Precio</th>
              <th>Seleccionar</th>
            </tr>
            </thead>
            <tbody>
            <?foreach ($entradas as $key => $value) { ?>
              <tr>
                  <td><?php echo $value->nombre; ?></td>
                  <td><?php echo $value->cantidad; ?></td>
                  <td><?php echo $value->desc; ?></td>
                  <td><?php echo $value->precio; ?></td>
                  <td><?php if($value->cantidad>0){ ?>

                      <div class="radio">
                        <label>
                          <input type="radio" name="entrada"  value="<?php echo $value->id;?>">
                            
                        </label>
                      </div>
                      <?php }else{
                        echo 'agotado';
                      }?>

                  </td>
              </tr>
           <?php } ?>
        
 
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
         
        </div>
        <!-- /.col -->
        <div class="col-xs-6">

        
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <button type="submit" id="comprar_ticket" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Comprar
          </button>
        </div>
      </div>
    </section>