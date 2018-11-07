jQuery(document).ready(function($){




    var frame_pdf;
    $('#boton_img').click(function(e){
        e.preventDefault();

        if (frame_pdf) {
            frame_pdf.open();
            return;
        }

        frame_pdf = wp.media.frames.frame_pdf = wp.media({
            title: meta_imagen_descarga.title,
            button: { text:  meta_imagen_descarga.button },
            library: { type: 'application/pdf' }
        });


        frame_pdf.on('select', function(){
            var media_attachment = frame_pdf.state().get('selection').first().toJSON();
            $('#imagen_descarga').val(media_attachment.url);
        });


        frame_pdf.open();

    });





  var formato_exel;
  $('#miexel').click(function(e){
    e.preventDefault();

    if (formato_exel) {
        formato_exel.open();
        return;
    }

    formato_exel = wp.media.frames.frame_pdf = wp.media({
        title: meta_imagen_descarga.title,
        button: { text:  meta_imagen_descarga.button },
        library: { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' }
    });


formato_exel.on('select', function(){
    var media_attachment = formato_exel.state().get('selection').first().toJSON();
    $('#reporte_ejecutivo').val(media_attachment.url);
});


formato_exel.open();


  });



});
