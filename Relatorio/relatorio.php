<?php
include("../config.php");

use Dompdf\Dompdf;
require_once('dompdf/autoload.inc.php');
$dompdf = new Dompdf();
$dompdf-> loadHtml("Você não está andando em circulos, apenas não esta visualizando da perspectiva correta...");
$dompdf->set_option('defaultFont', 'Times New Roman');
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream();

?>
