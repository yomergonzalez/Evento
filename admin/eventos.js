$(function () {

evento= ''
entrada=''

$('#horapicker').timepicki();

$('#fechapicker').datepicker({
	startDate: '+1d'
});

 var table=  $('#table-eventos').DataTable( {
            "ajax": "eventos/getList",
             select: true,

            "columns": [
                { "data": "id" },
                { "data": "name" },
                { "data": "date" },
                { "data": "nombre" },
                {"data": null, "width": "9%", className: "text-center", "defaultContent": "<div class='btn-group' role='group'> <button type='button' class='btn btn-primary dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Opciones <span class='caret'></span></button> <ul class='dropdown-menu'><li><a href='#' class='edit_event'><span class='fa fa-sign-out'></span>Agregar entradas</a></li><li><a href='#' class='delete_evento'><span class='glyphicon glyphicon-remove'></span>Eliminar</a></li><li><a href='#' class='entradas_vendidas'><span class='fa fa-address-book-o'></span> Ver Vendidas</a></li></ul></div></div>"}            ],
                "sDom": '<"toolbar col-sm-6 row">frtip'
       } );
table.on( 'select', function ( e, dt, type, indexes ) {
            var rowData = table.rows( indexes ).data().toArray();
           evento= rowData[0];
        } )



 $('#nuevo_evento').on('submit', function (e) {
        e.preventDefault();
        $.blockUI();

        var form = $(this);
        var empty = false;
            console.log(form.serializeArray());

        $.each(form.serializeArray(), function (i, field) {
                    if (field.value == '') {
                        empty = true;
                        }

        });
        if (empty){
        	swal('','Faltan datos','error')
            return false;
           }
        var datos = form.serializeArray();

        $.ajax({
            url: 'eventos/crear',
            type: 'POST',
            dataType: 'json',
            data: datos
        })
                .done(function (data) {
                    table.ajax.reload()
                    swal('Completado','evento registrado','success')
                    form.trigger("reset");
                    $('#newevent').modal('hide');
                })
                .fail(function () {
                })
                .always(function () {
		                    $.unblockUI();
                });
    });

	
$('#table-eventos').on('click', '.delete_evento', function (e) {
  $.ajax({
            url: 'eventos/delete_evento' ,
            type: 'POST',
            dataType: 'json',
            data: 'evento_id='+ evento.id
        })
                .done(function (data) {
                    table.ajax.reload()
                    swal('Completado','evento eliminado','success')
                })
                .fail(function () {
                })
                .always(function () {
                    console.log("complete");
                });

            });


});



 
$('#table-eventos').on('click', '.entradas_vendidas', function (e) {
		
		$('#vendidas').modal('show');

	 var table_vendidas =  $('#table-vendidas').DataTable( {
		            "ajax": {
					    "url": "tickets/vendidas",
					    "data": {
		        				"event_id": evento.id
		   				 }
		   				},
		   				destroy : true,
		            "columns": [
		                { "data": "entrada" },
		                { "data": "usuario" },
		                { "data": "fecha" },
		                { "data": "email" }
		               ],
		                "sDom": '<"toolbar col-sm-6 row">p'
		       } );

	
});



$('#table-eventos').on('click', '.edit_event', function (e) {
		if(evento.nombre=='Ilimitado'){
			$('.cantidad_entrada').hide();
		}else{
			$('.cantidad_entrada').show();
		}
		$('#tipoentrada').modal('show');

	 var table_entrada =  $('#table-entrada').DataTable( {
		            "ajax": {
					    "url": "eventos/getEntradas",
					    "data": {
		        				"event_id": evento.id
		   				 }
		   				},
		   				destroy : true,
		             select: true,
		            "columns": [
		                { "data": "id" },
		                { "data": "cantidad" },
		                { "data": "nombre" },
		                { "data": "desc" },
		                { "data": "precio" },
		                {"data": null, "width": "9%", className: "text-center", "defaultContent": "<button type='button' class='btn btn-danger btn-xs delete_entrada'><span class='glyphicon glyphicon-remove'></span></button>"}            ],
		                "sDom": '<"toolbar col-sm-6 row">p'
		       } );

	
table_entrada.on( 'select', function ( e, dt, type, indexes ) {
            var rowData = table.rows( indexes ).data().toArray();
           entrada= rowData[0];
           console.log(entrada)
        } )





	 $('#nueva_entrada').on('submit', function (e) {
        e.preventDefault();
        $.blockUI();
        var form = $(this);
        var empty = false;
            console.log(form.serializeArray());

        $.each(form.serializeArray(), function (i, field) {
                    if (field.value == '' && field.name!='cantidad' && evento.nombre!='Ilimitado') {
                        empty = true;
                        }

        });
        if (empty){
        	swal('','Faltan datos','error')
            return false;
           }
        var datos = form.serialize();

        $.ajax({
            url: 'eventos/agregar_entrada' ,
            type: 'POST',
            dataType: 'json',
            data: datos + '&event_id='+ evento.id
        })
                .done(function (data) {
                    table_entrada.ajax.reload()
                    swal('Completado','entrada agregada','success')
                    form.trigger("reset");
                })
                .fail(function () {
                })
                .always(function () {
		               $.unblockUI();
                });

            });

		
		
		 





	});





$('#search_ticket').on('click', function (e) {
           $.blockUI();

		  $.ajax({
		            url: 'tickets/getEvento' ,
		            type: 'POST',
		            dataType: 'html',
		            data: 'evento_id='+ $('#select_event').val()
		        })
		                .done(function (data) {
		                    $('#evento_detalles').html(data);
		                })
		                .fail(function () {
		                })
		                .always(function () {
		                    $.unblockUI();
		                });

});


	
 $('body #nuevo_ticket').on('submit', function (e) {
 		var input = $('body input[name=entrada]:checked').val();
 		if(!input){
 			swal('error','selecciona la entrada','error');
 			return false
 		}

        e.preventDefault();

           $.blockUI();

		  swal({
		  title: 'Ingresa Email para confirmar',
		  input: 'email',
		  showCancelButton: true,
		  confirmButtonText: 'Confirmar',
		  showLoaderOnConfirm: true,
		  preConfirm: function (email) {
		    return new Promise(function (resolve, reject) {
		      setTimeout(function() {
		        if (email === '') {
		          reject('campo vacio')
		        } else {
		          resolve()
		        }
		      }, 2000)
		    })
		  },
		  allowOutsideClick: false
		}).then(function (email) {
			var form = $('#nuevo_ticket').serialize();
			 $.ajax({
		            url: 'tickets/comprar' ,
		            type: 'POST',
		            dataType: 'html',
		            data: form + '&email='+ email + '&entrada_id='+ input
		        })
		                .done(function (data) {
		                	swal('listo','entrada comprada','success');
		                	location.reload();
		        
		                })
		                .fail(function () {
		                })
		                .always(function () {
		                    $.unblockUI();
		                });
		  
		});

	});

$('#verificar_ticket').on('submit', function (e) {
         e.preventDefault();

         $.blockUI();
		  
			var form = $(this).serialize();
			 $.ajax({
		            url: 'portero/verificar' ,
		            type: 'POST',
		            dataType: 'json',
		            data: form
		        })
		                .done(function (data) {
		                	console.log(data.used)
		                	console.log(data.exist)
							if(data.used==true && data.exist==true){
		                		swal('Usada','entrada usada','warning');
		                	}else if(data.used==false && data.exist==true){	
		                		swal('Success','Entrada verificada','success');
		                	}else{
		                		swal('Error','entrada no existe','error');
		                	}
		        
		                })
		                .fail(function () {
		                })
		                .always(function () {
		                    $.unblockUI();
		                });
		  
		});

$('#registrar').on('submit', function (e) {
         e.preventDefault();

         $.blockUI();
		  
			var form = $(this).serialize();
			 $.ajax({
		            url: 'login/registrar' ,
		            type: 'POST',
		            dataType: 'json',
		            data: form
		        })
		                .done(function (data) {
		                	if(data==true)
		                		swal('Success','Registrado','success'); 
                    			$('#registro').modal('hide');	
                    			document.getElementById("registrar").reset();

		        
		                })
		                .fail(function () {
		                })
		                .always(function () {
		                    $.unblockUI();
		                });
		  
		});




