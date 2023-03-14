<?php

use Dompdf\Dompdf;

require '../vendor/autoload.php';

   ob_start();
   include('templateFinanceiro.php');
   $conteudo = ob_get_contents();
   ob_end_clean();

  
 
   $dompdf = new Dompdf();
   $dompdf->loadHtml($conteudo);
   $dompdf->setPaper('A4', 'landscape');
   $dompdf->render();
   $dompdf->stream(
    "Textos.pdf",
     array(
         "Attachment"=>false
     )
);
?>

