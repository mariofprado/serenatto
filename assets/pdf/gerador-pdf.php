<?php

require '../../vendor/autoload.php';

use Dompdf\Dompdf;

ob_start();
require 'content/pdf-content.php';
$pdf = ob_get_clean();

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($pdf);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4','portrait');
// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();

