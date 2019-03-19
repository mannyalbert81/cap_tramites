
/**************************************************************************************/









function tabla_usuarios(){
	 $(document).ready( function (){
	     $.ajax({
	               beforeSend: function(){
	                 $("#tabla_usuarios").html("")
	               },
	               url: 'index.php?controller=usuarios&action=tabla_usuarios',
	               type: 'POST',
	               data: null,
	               success: function(x){
	                 $("#tabla_usuarios").html(x);
	               },
	              error: function(jqXHR,estado,error){
	                $("#tabla_usuarios").html("Ocurrio un error al cargar la informacion de usuarios..."+estado+"    "+error);
	              }
	            });
	   })
	}





*******************************************************************/
