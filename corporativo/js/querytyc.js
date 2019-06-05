
/*


                   ..oo$00ooo..                    ..ooo00$oo..
                .o$$$$$$$$$'                          '$$$$$$$$$o.
             .o$$$$$$$$$"             .   .              "$$$$$$$$$o.
           .o$$$$$$$$$$~             /$   $\              ~$$$$$$$$$$o.
         .{$$$$$$$$$$$.              $\___/$               .$$$$$$$$$$$}.
        o$$$$$$$$$$$$8              .$$$$$$$.               8$$$$$$$$$$$$o
       $$$$$$$$$$$$$$$              $$$$$$$$$               $$$$$$$$$$$$$$$
      o$$$$$$$$$$$$$$$.             o$$$$$$$o              .$$$$$$$$$$$$$$$o
      $$$$$$$$$$$$$$$$$.           o{$$$$$$$}o            .$$$$$$$$$$$$$$$$$
     ^$$$$$$$$$$$$$$$$$$.         J$$$$$$$$$$$L          .$$$$$$$$$$$$$$$$$$^
     !$$$$$$$$$$$$$$$$$$$$oo..oo$$$$$$$$$$$$$$$$$oo..oo$$$$$$$$$$$$$$$$$$$$$!
     {$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$}
     6$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$?
     '$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$'
      o$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$o
       $$$$$$$$$$$$$$;'~`^Y$$$7^''o$$$$$$$$$$$o''^Y$$$7^`~';$$$$$$$$$$$$$$$
       '$$$$$$$$$$$'       `$'    `'$$$$$$$$$'     `$'       '$$$$$$$$$$$$'
        !$$$$$$$$$7         !       '$$$$$$$'       !         V$$$$$$$$$!
         ^o$$$$$$!                   '$$$$$'                   !$$$$$$o^
           ^$$$$$"                    $$$$$                    "$$$$$^
             'o$$$`                   ^$$$'                   '$$$o'
               ~$$$.                   $$$.                  .$$$~
                 '$;.                  `$'                  .;$'
                    '.                  !                  .`

*/





$(document).ready(function(){


LoadSelect2Script(select2test);



var folio;
var consulta;
var tipo;

$("#name").focus();

        $("#submit").click(function(e){
                                     
              
              consulta = $("#name").val();
              tipo = $("#selection").val();

if (tipo==4) {

  $.ajax({
                    type: "POST",
                    url: "dom/busquedaproducto.php",
                    data: "b="+consulta,
                    dataType: "html",
                    beforeSend: function(){
                         
                          $("#resultado").html("<p align='center'><img src='img/loader.gif' /></p>");
                    },
                    error: function(){
                          alert("error petición");
                    },
                    success: function(data){                                                    
                          $("#resultado").empty();

                          $("#resultado").append(data);    

                                                                            
                    }
                    });
}

if (tipo==3) {

  $.ajax({
                    type: "POST",
                    url: "../../app/ajax/busquedaproductoitem.php",
                    data: "b="+consulta,
                    dataType: "html",
                    beforeSend: function(){
                         
                          $("#resultado").html("<p align='center'><img src='../../app/img/loader.gif' /></p>");
                    },
                    error: function(){
                          alert("error petición");
                    },
                    success: function(data){                                                    
                          $("#resultado").empty();

                          $("#resultado").append(data);

                                                                                  
                    }
                    });
}

if (tipo==2) {

  $.ajax({
                    type: "POST",
                    url: "../../app/ajax/busquedabastos.php",
                    data: "b="+consulta,
                    dataType: "html",
                    beforeSend: function(){
                         
                          $("#resultado").html("<p align='center'><img src='../../app/img/loader.gif' /></p>");
                    },
                    error: function(){
                          alert("error petición");
                    },
                    success: function(data){                                                    
                          $("#resultado").empty();

                          $("#resultado").append(data);    

                                                                            
                    }
                    });
}

if (tipo==1) {

  $.ajax({
                    type: "POST",
                    url: "../../app/ajax/busquedabastositem.php",
                    data: "b="+consulta,
                    dataType: "html",
                    beforeSend: function(){
                         
                          $("#resultado").html("<p align='center'><img src='../../app/img/loader.gif' /></p>");
                    },
                    error: function(){
                          alert("error petición");
                    },
                    success: function(data){                                                    
                          $("#resultado").empty();

                          $("#resultado").append(data);

                                                                                  
                    }
                    });
}

              



          });

     $("#name").keypress(function(e){
                                     
        if(e.keyCode == 13) {
        
        
             
              consulta = $("#name").val();
              tipo = $("#selection").val();

if (tipo==2) {

  $.ajax({ 
                    type: "POST",
                    url: "../../app/ajax/busquedabastos.php",
                    data: "b="+consulta,
                    dataType: "html",
                    beforeSend: function(){
                         
                          $("#resultado").html("<p align='center'><img src='../../app/img/loader.gif' /></p>");
                    },
                    error: function(){
                          alert("error petición");
                    },
                    success: function(data){                                                    
                          $("#resultado").empty();

                          $("#resultado").append(data);    
                                                   
                    }
                    });
}

if (tipo==1) {

  $.ajax({
                    type: "POST",
                    url: "../../app/ajax/busquedabastositem.php",
                    data: "b="+consulta,
                    dataType: "html",
                    beforeSend: function(){
                         
                          $("#resultado").html("<p align='center'><img src='../../app/img/loader.gif' /></p>");
                    },
                    error: function(){
                          alert("error petición");
                    },
                    success: function(data){                                                    
                          $("#resultado").empty();

                          $("#resultado").append(data);

                                                                            
                    }
                    });
}
if (tipo==4) {

  $.ajax({
                    type: "POST",
                    url: "../../app/ajax/busquedaproducto.php",
                    data: "b="+consulta,
                    dataType: "html",
                    beforeSend: function(){
                         
                          $("#resultado").html("<p align='center'><img src='../../app/img/loader.gif' /></p>");
                    },
                    error: function(){
                          alert("error petición");
                    },
                    success: function(data){                                                    
                          $("#resultado").empty();

                          $("#resultado").append(data);    

                                                                            
                    }
                    });
}

if (tipo==3) {

  $.ajax({
                    type: "POST",
                    url: "../../app/ajax/busquedaproductoitem.php",
                    data: "b="+consulta,
                    dataType: "html",
                    beforeSend: function(){
                         
                          $("#resultado").html("<p align='center'><img src='../../app/img/loader.gif' /></p>");
                    },
                    error: function(){
                          alert("error petición");
                    },
                    success: function(data){                                                    
                          $("#resultado").empty();

                          $("#resultado").append(data);

                                                                                  
                    }
                    });
}
 } 
          });
      





$("#consultat").click(function(e){
                                     
              
              consulta = "98";
              $.ajax({
                    type: "POST",
                    url: "../../app/ajax/transmisiones.php",
                    data: "b="+consulta,
                    dataType: "html",
                    beforeSend: function(){
                         
                          $("#listat").html("<p align='center'>Buscando ...<img src='../../app/img/loader.gif' /></p>");
                    },
                    error: function(){
                          alert("error petición");
                    },
                    success: function(data){                                                    
                          $("#listat").empty();

                          $("#listat").append(data);                                                             
                    }
                    });
          });

$("#consultam").click(function(e){
                                     
              
              consulta = "98";
              $.ajax({
                    type: "POST",
                    url: "../../app/ajax/master.php",
                    data: "b="+consulta,
                    dataType: "html",
                    beforeSend: function(){
                         
                          $("#listat").html("<p align='center'>Buscando ...<img src='../../app/img/loader.gif' /></p>");
                    },
                    error: function(){
                          alert("error petición");
                    },
                    success: function(data){                                                    
                          $("#listat").empty();

                          $("#listat").append(data);                                                             
                    }
                    });
          });

        });

          function select2test() {
            $("#nombre").select2();  
            $("#item").select2(); 
             $("#consultat").select2();
              $("#consultam").select2();   

          }