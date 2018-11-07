<section id="boton_menu_puntos">
  <div id="contenido_menup_puntos">
    <?php 

    $compra_actual= WC()->cart->subtotal;

    $canjeados = WC()->cart->subtotal;

   $implement_p =$puntos_automatic_anuales-$compra_actual; 

     ?>
    <ul>
      <li>
          <label><b>DISPONIBLES</b></label><br>
          <label id="puntos_totales" class="puntos_totales"><i><?php echo $puntos_automatic_anuales; ?> BOGE-POINTS</i></label>
      </li>

      <li>
          <label><b>CANJEADOS</b></label><br>
          <label id="puntos_uno" class="puntos_uno"><i><?php echo $canjeados; ?> BOGE-POINTS</i></label>
      </li>

    <li>
      <label><b>RESTANTES</b></label><br>
      <label id="puntos_restantes" class="puntos_restantes"><i><?php echo $puntos_automatic_anuales-$compra_actual; ?> BOGE-POINTS</i></label>
    </li>
  </ul>
  </div>
</section>