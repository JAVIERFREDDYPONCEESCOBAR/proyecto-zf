$(document).ready( function () {


var contadorm = 1;
$('.inim2').on("click",function(e){
if (contadorm == 1) {
	$('.inim2').removeClass("activee");
	$('.inim2').addClass("activee");
    $('.segunda_sec_menu').show();
      contadorm = 0;
        } else {
$('.inim2').removeClass("activee");
$('.segunda_sec_menu').hide();
contadorm = 1;
        }

});





var text_titi = $("#todo_tot").text().replace('$','');
$("#relativo").text(text_titi);

var contadorm2=1;

$('#botton_m').on("click",function(e){
if (contadorm2 == 1) {
    $('#menu_cat').removeClass("animated slideOutLeft");
    $('#menu_cat').addClass("animated slideInLeft");
    $('#menu_cat').show();
           contadorm2 = 0;
        }
})


$('#cerrar').on("click",function(){
if (contadorm2 == 0) {
    $('#menu_cat').removeClass("animated slideInLeft");
    $('#menu_cat').addClass("animated slideOutLeft");
    contadorm2 = 1;
                   }
});

var colocar = $('#cat_fact').data('agregadas');
var inc_fac = $('#cat_fact').val();

if (inc_fac > 0) {
$('#status_alta_de_facturas').modal('show');
$('#mensaje_factura').html(colocar+' Facturas agregadas correctamente');
}else if(inc_fac == "undefined"){
$('#status_alta_de_facturas').modal('hide');
}else if(inc_fac < 0){
$('#status_alta_de_facturas').modal('hide');
}



$('#cargar_estado_cuenta').on("click",function(){


datosf = $('#estado_de_cuenta').html();

$.ajax({
    type:"POST",
    url:'/wp/wp-content/themes/produccion_zf/componentes/imprimir_estado_cuenta.php',
    data:{"datosf": datosf},
    success:function(data){
      console.log(data);
       window.open('/wp/wp-content/themes/produccion_zf/componentes/imprimir_estado_cuenta.php','_blank');
    }
  })



});

$('.activar_mob').on("click",function(){

$('#exampleModalLongTitle').html('CANJE  #'+$(this).attr('data-orden'));
var id_order = $(this).attr('data-orden');

$.ajax({
    type:"POST",
    url:'/wp/wp-content/themes/produccion_zf/componentes/peticion_orden.php',
    data:{"id_order": id_order},
    success:function(data_or){
      $('#datos_de_orden').html(data_or);
    }
  })
$('#exampleModalCenter').modal('show');

});



$('.id_descarga_convenio').on("click",function(){
$(this).html('Solicitado');
$(this).addClass( "color_beneficios" );


});

$('#frt' ).on( 'click', function() {
	var datosform = $("#form_regustro_user").serialize();

	 $.ajax({
	    type:"POST",
	    url: themeurl+'/componentes/actualizar_usuarios.php',
	    data: datosform,
	    success:function(data){
				$("#frt").val("Procesando..");
	      alert(data);

	    }
   })
$("#frt").val("Guardar");
});



var intt1 = 0;
$( ".df1" ).hover(function() {

  if (intt1==0) {

$('.ttt1').css("display", "block");
intt1 = 1;
  }else{
$('.ttt1').hide();
intt1 = 0;

  }


});


var intt2 = 0;
$( ".df2" ).hover(function() {

  if (intt2==0) {

$('.ttt2').css("display", "block");
intt2 = 1;
  }else{
$('.ttt2').hide();
intt2 = 0;

  }


});


  /*
   * WOW init
   */
  new WOW().init();


});
