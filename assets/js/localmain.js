$(document).ready(function() {
    $('#example').DataTable({

    	"language": {
    		"lengthMenu": "Mostrar _MENU_ registros",
    		"zeroRecords": "No se econtraron resultados",
    		"info": "Mostrando registros del _START_ al _END_ de un _TOTAL_ registros",
    		"infoEmpy": "Mostrando registros del 0 al 0 de 0 registros",
    		"sSearch": "Buscar",
    		"oPaginate": {
    			"sFirst": "Primero",
    			"sLast": "Ultimo",
    			"sNext": "Siguente",
    			"sPrevious": "Anterior",
    		},
    		"sProcessing": "Procesando...",
    	}
    });
});