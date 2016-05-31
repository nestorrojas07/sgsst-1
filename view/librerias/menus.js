//$(document).on("ready", function(){
//    
//    var perfil = $('#perfil_user').val();
//    var idsimplex = $('#idsimplex').val();
//    
//    console.log(perfil+' - '+idsimplex);
//    
//    $.ajax({
//        
//        url:'../controller/controlador_menus.php',
//        type:'POST',
//        data:'perfil='+perfil+'&idsimplex='+idsimplex+'&boton=menus',
//        
//    }).done(function(respuesta){
//        alert(respuesta);
//        
//        var reg = eval(respuesta);
//        
//        
//         html='<div>';
//        for (i = 0 ; i < reg.length ; i++  )
//        {
//            
//            html +='<li>';
//            html +='<a href="">';
//            html +='<i class="'+reg[i].icono+'"></i>';
//            html +='<span class="title">'+reg[i].titulo+'</span>';
//            html +='</a>';
//            html +='<ul>';
//            html +='<li>';
//            html +='<a href="">';
//            html +='<span class="title">1</span>';
//            html +='</a>';
//            html +='</li>';
//            html +='<li>';
//            html +='<a href="">';
//            html +='<span class="title">2</span>';
//            html +='</a>';
//            html +='</li>';
//            html +='</ul>';
//            html +='</li>';
//            
//         
//        }
//        html +='</div>';
//        
//        $('#listar_menus').html(html);
//    });
//    
//    
//});
