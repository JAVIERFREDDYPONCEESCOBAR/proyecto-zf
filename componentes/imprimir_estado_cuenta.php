<?php
require'../vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

 ob_start();
require'estado_cuenta.php';
$html = ob_get_clean(); 

 $html2pdf = new Html2Pdf('P','A4','es','true','UTF-8');
 $html2pdf->writeHTML($html);
 $html2pdf->output('Estado_de_cuenta.pdf');
?>