<?php

require_once('../app/TCPDF-main/tcpdf.php');
include('../app/config.php');

$id_presupuesto_get = $_GET['id_presupuesto'];
$nro_presupuesto_get = $_GET['nro_presupuesto'];

$sql_presupuestos = "SELECT *, cli.nombre_cliente as nombre_cliente
                	FROM tb_presupuestos as pre INNER JOIN tb_clientes as cli ON cli.id_cliente = pre.id_cliente where pre.id_presupuesto = '$id_presupuesto_get' ";

$query_presupuestos = $pdo->prepare($sql_presupuestos);
$query_presupuestos->execute();
$presupuestos_datos = $query_presupuestos->fetchAll(PDO::FETCH_ASSOC);

foreach ($presupuestos_datos as $presupuestos_dato) {

    $fyh_creacion = $presupuestos_dato['fyh_creacion'];
    $nro_presupuesto = $presupuestos_dato['nro_presupuesto'];
    $id_cliente = $presupuestos_dato['id_cliente'];
    $rut_cliente = $presupuestos_dato['rut_cliente'];
    $nombre_cliente = $presupuestos_dato['nombre_cliente'];

}

$fecha = date("d/m/Y", strtotime($fyh_creacion));

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(215,279), true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('TrucksRepair');
$pdf->setTitle('Presupuesto');
$pdf->setSubject('Presupuesto');
$pdf->setKeywords('Presupuesto');

// set default header data
//$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(5, 5, 5);
//$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->setFont('dejavusans', '', 10, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// Set some content to print
$html ='
<style>
h1 {
    text-align: center;
    margin-top: 40px;
}

.tc {
    text-align: center;
}

</style>

<table border="0">

<tr>
<td><img src="../public/images/logotr-s.jpg"></td>
<td></td>
<td></td>
</tr>


<tr>
<td style="text-align: center"><b>SISTEMA VENTAS TRUCKSREPAIR</b></td>
<td></td>
<td style="font-size: 16px"><b>RUT: </b>77.131.991-2</td>
</tr>


<tr>
<td style="text-align: center">Av. Rio Viejo #1110</td>
<td></td>
<td style="font-size: 10px"><b>Nro Presupuesto: </b>'.$id_presupuesto_get.'</td>
</tr>
<tr>
<td style="text-align: center">+56 972628921</td>
<td></td>
<td style="font-size: 14px"><b>Nro de Autorización: </b> 100002000993</td>
</tr>
<tr>
<td style="text-align: center">CHILLÁN - CHILE</td>
<td></td>
<td></td>
</tr>
</table>
<br><br>



<h1>PRESUPUESTO</h1>

<div style="border: 1px solid #000000">
<table border="0" cellpadding="6px">
<tr>
    <td><b>Fecha: </b>'.$fecha.' </td>
    <td></td>
    <td><b>Rut:</b> '.$rut_cliente.' </td>
</tr>
<tr>
    <td colspan="3"><b>Señor(es):</b> '.$nombre_cliente.' </td>
    <td></td>
    <td><b></b></td>
</tr>
</table>
</div>

<br><br>
<table border="1" cellpadding="5">
<tr style="text-align: center;background-color: #c0c0c0">
    <th style="width: 40px">Nro</th>
    <th style="width: 100px">Codigo TrucksRepair</th>
    <th style="width: 300px">Nombre Producto</th>
    <th style="width: 70px">Ctd</th>
    <th style="width: 95px">Precio Unitario</th>
    <th style="width: 70px">Sub Total</th>
</tr>
';
$contador_de_carrito_presupuesto = 0;
$cantidad_total_presupuesto = 0;
$precio_unitario_total = 0;
$precio_total_presupuesto = 0;

$sql_carrito_presupuesto = "SELECT *,pro.nombre as nombre_producto, pro.id as id_producto, pro.descripcion as descripcion, pro.precio_venta as precio_venta,
pro.stock as stock, pro.id_producto as id_producto 
FROM tb_carrito_presupuesto AS carrp INNER JOIN tb_almacen as pro 
ON carrp.id_producto = pro.id_producto 
WHERE nro_presupuesto = '$nro_presupuesto_get' 

ORDER BY id_carrito_presupuesto ASC";

$query_carrito_presupuesto = $pdo->prepare($sql_carrito_presupuesto);
$query_carrito_presupuesto->execute();
$carrito_presupuesto_datos = $query_carrito_presupuesto->fetchAll(PDO::FETCH_ASSOC);
foreach ($carrito_presupuesto_datos as $carrito_presupuesto_dato) {
    $id_carrito_presupuesto = $carrito_presupuesto_dato['id_carrito_presupuesto'];
    $contador_de_carrito_presupuesto = $contador_de_carrito_presupuesto + 1;
    $cantidad_total_presupuesto = $cantidad_total_presupuesto + $carrito_presupuesto_dato['cantidad'];
    $precio_unitario_total = $precio_unitario_total + floatval($carrito_presupuesto_dato['precio_venta']);
    $subtotal_presupuesto = $carrito_presupuesto_dato['cantidad'] * $carrito_presupuesto_dato['precio_venta'];
    $precio_total_presupuesto = $precio_total_presupuesto + $subtotal_presupuesto;

    $html .='
    <tr>
        <td class="tc">'.$contador_de_carrito_presupuesto.'</td>
        <td class="tc">'.$carrito_presupuesto_dato['id'].'</td>
        <td class="tc">'.$carrito_presupuesto_dato['nombre_producto'].'</td>
        <td class="tc">'.$carrito_presupuesto_dato['cantidad'].'</td>
        <td class="tc">'.$carrito_presupuesto_dato['precio_venta'].'</td>
        <td class="tc">'.$subtotal_presupuesto.'</td>
    </tr>
    ';

}

$html .='

<p style="text-align: right">
    <b>Monto total</b> '.$precio_total_presupuesto.'
</p>


';

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
