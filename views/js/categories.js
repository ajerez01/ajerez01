// Editar Categoría.
$('.btn_action_group').on('click', '.btn_edit_Categoryid', function(){
    
    var categoryid = $(this).attr('categoryid');
    //alert('boton editar' + categoryid);

    var datos = new FormData();
    datos.append('categoryid' , categoryid);

    $.ajax({
        url:"ajax/categories.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response){
           // console.log(response['name']);
           $("#edCategoryName").val(response['name']);
           $("#edCategoryId").val(response["id"])
        },
        error: function(xhr, status, error){
            console.error('Error: ', error);
        }
    });

})
// Eliminar Categoría.
$('.btn_action_group').on('click', '#btn_delete_Categoryid', function(){
    
    var categoryid = $(this).attr('categoryid');
    console.log(categoryid);

    Swal.fire({
        icon: "warning",
        title: "Esta seguro?",
        text: "¿Quiere eliminar la categoría " + categoryid + " ?",
        footer: "Esta accion no se puede deshacer",
        showCancelButton: true,
        confirmButtomcolor: "#d33",
        confirmButtomText: "Sí, eliminar categoría",
        cancelButtomText: "Cancelar"
    }).then((result => {
        if(result.isConfirmed){
            window.location.href = "index.php?ruta=categories&categoryId=" + categoryid;
            window.location.href = "categories";
        }
    } ))
})