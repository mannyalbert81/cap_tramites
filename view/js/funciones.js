
function tabla_turnos(){
	 $(document).ready( function (){
	     $.ajax({
	               beforeSend: function(){
	                 $("#tabla_turnos").html("")
	               },
	               url: 'index.php?controller=pantalla&action=tabla_turnos',
	               type: 'POST',
	               data: null,
	               success: function(x){
	                 $("#tabla_turnos").html(x);
	               },
	              error: function(jqXHR,estado,error){
	                $("#tabla_turnos").html("Ocurrio un error al cargar la informacion de Turnos..."+estado+"    "+error);
	              }
	            });
	   })
	}

