$( document ).ready(function() {
  // Asociar un evento al botón que muestra la ventana modal
  $('#ver-factura').click(function() {
    $.ajax({
        // la URL para la petición
        url : '/busqueda_factura.php',
 
        // la información a enviar
        data : { 'fac' : <?php echo $dato['factura']; ?> },
 
        // especifica si será una petición POST o GET
        type : 'GET',
 
        // el tipo de información que se espera de respuesta
        dataType : 'html',
 
        // código a ejecutar si la petición es satisfactoria;
        success : function(respuesta) {
            $('#MyProducto').html(respuesta);
        },
 
        // código a ejecutar si la petición falla;
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
    });
  });
});