<?php
include("../config.php");

use Dompdf\Dompdf;
require_once('dompdf/autoload.inc.php');
$dompdf = new Dompdf();
$dompdf-> loadHtml("Gerando Relatório = True");
$dompdf->set_option('defaultFont', 'Times New Roman');
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream();

?>
