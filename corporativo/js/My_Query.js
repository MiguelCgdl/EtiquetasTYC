
$( document ).ready( function (){
  // Esta primera parte crea un loader no es necesaria

});

function cargar_ui( url_ui){
  $.ajax({
    url:url_ui,
    type: "get",
    dataType: "html",
    success: function(data) {
     $("#contenido").append(data);//nombre del container
    }
  });
}

$("#reglamento").click( function () {    
  $("#contenido").empty();//
  cargar_ui("reglamento.html");
});
$("#pagolinea").click( function () {    
  $("#contenido").empty();//
  cargar_ui("pagolinea.html");
});

$("#cajaprocesor1").click( function () {
  $("#contenido").empty();
  cargar_ui("cajaprocesor1.html");
});
$("#cajaprocesod").click( function () {    
  $("#contenido").empty();
  cargar_ui("cajaprocesod.html");
});
$("#etiquetas").click( function () {    
  $("#contenido").empty();
  cargar_ui("etiquetas.php");
});
$("#etiquetasp").click( function () {    
  $("#contenido").empty();
  cargar_ui("etiquetasp.php");
});

///////pruebas de vic


$("#telefono").click( function () {    
  $("#contenido").empty();
  cargar_ui("telefono.html");
});

$("#revisionrapida").click( function () {    
  $("#contenido").empty();
  cargar_ui("revisionrapida.html");
});

//////
$("#Manuales").click( function () {    
  $("#contenido").empty();
  cargar_ui("manuales.php");
});

$("#empresa_listar").click( function () {    
  $("#contenido").empty();
  cargar_ui("Empresa_Listar.php");
});
$("#empresa_registro").click( function () {    
  $("#contenido").empty();
  cargar_ui("Empresa_Reg.html");
});
$("#proyecto_registro").click( function () {    
  $("#contenido").empty();
  cargar_ui("Proyecto_Registro.php");
});
$("#proyecto_listar").click( function () {    
  $("#contenido").empty();
  cargar_ui("Proyecto_Listar.php");
});