
$(".userpicture").change(
    function(){
      var _image = this.files[0];
      //console.log(_image['type']);

      if(_image['type'] != 'image/jpeg' && _image['type'] != 'image/png'){
        $(".userpicture").val("");

        Swal.fire({
            icon: "error",
            title: "Error tipo de archivo",
            text: "La imagen debe ser jpeg o png",
            footer: "POS"
          });
      }
      else if(_image['size'] > 5000000){
        $(".userpicture").val("");

        Swal.fire({
            icon: "error",
            title: "Error tamaño imagen",
            text: "La imagen debe ser menor a 5MB",
            footer: "POS"
          });     
      }
      else{
        var imagedata = new FileReader;
        imagedata.readAsDataURL(_image);

        $(imagedata).on("load", function(event){
            var imagepath = event.target.result;
            $(".img-preview").attr('src', imagepath);
        });

      }

    }
)

/* Funcion de ajax para conectar con base de datos
   tomando como parametro el ID del usuario */

//$('.btn-user-edit').click(function(){  // En resolucion pequeña, no existe este clase.
$('.table').on('click', '.btn-user-edit', function(){   // Para este caso el click es sobre el elemento tabla.
  var idusuario = $(this).attr('idusuario');
  //console.log('el id de usuario',idusuario);
  var datos = new FormData();
  datos.append("id", idusuario);

  $.ajax({
    url:"ajax/users.ajax.php",
    method:"POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){
         //  console.log(respuesta);
          $('#edUserName').val(respuesta['name']);
          $('#edUserId').val(respuesta['userid']);
          $('#edUserProfile').val(respuesta['profile']);
          $('#edUserPassword').val(respuesta['password']);  // Guardar password actual para la actulizacion.
          $('#edImage').val(respuesta['picture']);

          if (respuesta['picture'] != ''){
            $('.img-preview').attr('src' ,respuesta['picture']);
          } 
          else{
            $('.img-preview').attr('src', 'views/img/users/default/anonymous.png');
          }
    },
    error: function (xhr, status, error) {
      console.error('Errores:', error);
  }
  });

})

// ACTIVAR-DESACTIVAR USUARIO ****
//$('.btn-activate').click(function(){
  $('.table').on('click','.btn-activate',function(){ 
   var idusuario = $(this).attr('userid');
   var userstatus = $(this).attr('userstatus');
   console.log(idusuario, " - ", userstatus);
   var datos = new FormData();
   datos.append("userid", idusuario);
   datos.append("userstatus", userstatus);

   $.ajax({
    url:"ajax/users.ajax.php",
    method:"POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){
      // Mostramos una notificacion al usuario
      if(window.matchMedia("(max-width:767px)").matches){
        Swal.fire({
          title: 'Usuario <b>' + idusuario + '</b> actualizado correctamente',
          icon: 'success',
          showConfirmButton: false,
          timer: 1500
        }).then(function(result){
            window.location = "users";
        })
      }

    },
    error: function (xhr, status, error) {
      // Mostramos una notificacion al usuario
      Swal.fire({
        title: 'Error',
        text: 'Hubo un error al activar el usuario',
        icon: 'error',
        showConfirmButton: true
      });
  }
  });

    if (userstatus == 0){
      $(this).removeClass('btn-success');
      $(this).addClass('btn-warning');
      $(this).html('desactivado');
      $(this).attr('userstatus', 1);
    }
    else{
      $(this).removeClass('btn-warning');
      $(this).addClass('btn-success');
      $(this).html('Activado');
      $(this).attr('userstatus', 0);
    }

})

// Para validar usuario no repetido.
$('#newUserId').change(function(){

  /* quietar los mensajes de alerta */
   $('.alert').remove();

  var idusuario = $(this).val();
  
  var datos = new FormData();
  datos.append("newUserId", idusuario);

  $.ajax({
    url:"ajax/users.ajax.php",
    method:"POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){
      if(respuesta){
       /*  $('#newUserId').before('<div class="alert alert-warning">Usuario ya existe </div>') */
       $('#newUserId').parent().after('<div class="alert alert-warning">Usuario ya existe </div>')
        $('#newUserId').val("");
      }
    },
    error: function (xhr, status, error) {
      console.error('Errores:', error);
  }
  });

})

// Eliminar usuario.
//$('.userDelete').click(function(){
$('.table').on('click', '.userDelete', function(){ 

  var $id = $(this).attr("idusuario");
  var $userpicture = $(this).attr("userpicture");
  var $userid = $(this).attr("userid");

  Swal.fire({
    icon: "warning",
    title: "¿Estás seguro?",
    text: "¿Quieres eliminar el usuario " + $id + " ?",
    footer: "Esta acción no se puede deshacer",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    confirmButtonText: "Sí, eliminar usuario",
    cancelButtonText: "Cancelar"
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = "index.php?ruta=users&id=" + $id + "&userpicture=" + $userpicture + "&userid=" + $userid; // Redirige a la página de eliminación
    }
  });

})

