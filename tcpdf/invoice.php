<?php
//============================================================+
// File name   : example_005.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 005 for TCPDF class
//               Multicell
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Multicell
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('examples/config/tcpdf_config_alt.php');
require_once('tcpdf.php');
// print_r($_POST);
// exit;

function money($price)
{
	if ($price == '')
		$price = 0;
	return 'Rp '.number_format($price, 0, '.', ',');
}

$model = $_POST['model'];
$order = $_POST['order'];

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$gothic = TCPDF_FONTS::addTTFfont('century-gothic/GOTHIC.TTF', 'TrueTypeUnicode', '', 32);

// set default header data
$pdf->SetHeaderData('../../../asset/images/lg_logo_precise.jpg', 50);


// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
// if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
// 	require_once(dirname(__FILE__).'/lang/eng.php');
// 	$pdf->setLanguageArray($l);
// }

// ---------------------------------------------------------

// set font
// $pdf->SetFont($gothic, '', 8);

// add a page
$pdf->AddPage();



// $html = '<table border="0" cellpadding="3" style="font-size: xx-small;">
// 	<tr>
// 		<th width="41%" colspan="3"><b style="font-size: large;">SOLD TO</b></th>
// 		<th width="41%" colspan="3"><b style="font-size: large;">SHIP TO</b></th>
// 		<th width="18%" colspan="3"></th>
// 	</tr>
// 	<tr>
// 		<td width="10%">Nama</td>
// 		<td width="2%">:</td>
// 		<td width="29%">Deory Pandu</td>
// 		<td width="10%">Nama</td>
// 		<td width="2%">:</td>
// 		<td width="29%">Deory Pandu</td>

// 		<td width="6%">Status</td>
// 		<td width="2%">:</td>
// 		<td width="10%">Pending</td>
// 	</tr>
// 	<tr>
// 		<td>Alamat</td>
// 		<td>:</td>
// 		<td>Jl Martorejo No 113 ds dadaprejo kec junrejo</td>
// 		<td>Alamat</td>
// 		<td>:</td>
// 		<td>Jl Martorejo No 113 ds dadaprejo kec junrejo</td>
// 		<td></td>
// 		<td></td>
// 		<td></td>
// 	</tr>
// 	<tr>
// 		<td>Kota</td>
// 		<td>:</td>
// 		<td>Kota Surabaya</td>
// 		<td>Kota</td>
// 		<td>:</td>
// 		<td>Kota Surabaya</td>
// 		<td></td>
// 		<td></td>
// 		<td></td>
// 	</tr>
// 	<tr>
// 		<td>Kecamatan</td>
// 		<td>:</td>
// 		<td>Junrejo</td>
// 		<td>Kecamatan</td>
// 		<td>:</td>
// 		<td>Junrejo</td>
// 		<td></td>
// 		<td></td>
// 		<td></td>
// 	</tr>
// 	<tr>
// 		<td>HP</td>
// 		<td>:</td>
// 		<td>085646765265</td>
// 		<td>HP</td>
// 		<td>:</td>
// 		<td>085646765265</td>
// 		<td></td>
// 		<td></td>
// 		<td></td>
// 	</tr>
// 	<tr>
// 		<td>Email</td>
// 		<td>:</td>
// 		<td>deoryzpandu@gmail.com</td>
// 		<td>Email</td>
// 		<td>:</td>
// 		<td>deoryzpandu@gmail.com</td>
// 		<td></td>
// 		<td></td>
// 		<td></td>
// 	</tr>
// </table>';

$html = '<table border="0" cellpadding="10" style="font-size: xx-small; background-color: #8a888b; color: #fff">
	<tr>
		<td width="100%">
		Invoice # '.$model['invoice_prefix'].$model['invoice_no'].' <br>
		Order Date '.date('d F Y', strtotime($model['date_add'])).'
		</td>
	</tr>
</table>
<table border="0" cellpadding="10" style="font-size: xx-small; line-height: 1.5;">
	<tr style="background-color: #edebec;">
		<th width="50%" style="border: 1px solid #edebec;">SOLD TO:</th>
		<th width="50%" style="border: 1px solid #edebec;">SHIP TO:</th>
	</tr>

	<tr>
		<td width="50%" style="border: 1px solid #edebec;">

		'.$model['shipping_first_name'].' '.$model['shipping_last_name'].' <br>
		'.$model['shipping_address_1'].' <br>
		'.$model['shipping_city'].', '.$model['shipping_zone'].', '.$model['shipping_postcode'].' <br>
		'.$model['shipping_country'].' <br>
		T: '.$model['phone'].' <br>
		E: '.$model['email'].'

		</td>
		<td width="50%" style="border: 1px solid #edebec;">

		'.$model['shipping_first_name'].' '.$model['shipping_last_name'].' <br>
		'.$model['shipping_address_1'].' <br>
		'.$model['shipping_city'].', '.$model['shipping_zone'].', '.$model['shipping_postcode'].' <br>
		'.$model['shipping_country'].' <br>
		T: '.$model['phone'].' <br>
		E: '.$model['email'].'

		</td>
	</tr>
</table>
<span></span>
<br>
<table border="0" cellpadding="10" style="font-size: xx-small; line-height: 1.5;">
	<tr style="background-color: #edebec;">
		<th width="50%" style="border: 1px solid #edebec;">PAYMENT METHOD:</th>
		<th width="50%" style="border: 1px solid #edebec;">SHIPPING METHOD:</th>
	</tr>

	<tr>
		<td width="50%" style="border: 1px solid #edebec;">
		Bank Transfer - Account Info <br>
		Account holder: CV. Karya Jaya Mandiri Sakti <br>
		Account Number: 5060943232 <br>
		Bank name: BCA(Bank Central Asia) <br>
		Account holder: CV. Karya Jawa Mandiri Sakti <br>
		(INTERNATIONAL PURCHASE ONLY) (US$) <br>
		Account number: 2046000430 <br>
		Bank name: BII (Bank International Indonesia) <br>
		International <br>
		IBAN: IBBKIDJA <br>
		BIC: IBBKIDJAXXX
		</td>
		<td width="50%" style="border: 1px solid #edebec;">
		JNE Free Shipping<br><br>
		(Total Shipping Charges Rp 0.00)
		</td>
	</tr>
</table>
<span></span>
<br>
<table border="0" cellpadding="10" style="font-size: xx-small; line-height: 1.5;">
	<tr style="background-color: #edebec;">
		<th width="41%" style="border: 1px solid #edebec;">Products</th>
		<th width="15%" style="border: 1px solid #edebec;">SKU</th>
		<th width="18%" style="border: 1px solid #edebec;" align="right">Price</th>
		<th width="8%" style="border: 1px solid #edebec;" align="right">Qty</th>
		<th width="18%" style="border: 1px solid #edebec;" align="right">Subtotal</th>
	</tr>
';

foreach ($order as $key => $value) {
	$html .= '<tr>
			<td style="border: 1px solid #edebec;">
			'.$value['name'].' <br>
			Size: '.$value['attributes_name'].'</td>
			<td style="border: 1px solid #edebec;">'.$value['kode'].'</td>
			<td style="border: 1px solid #edebec;" align="right">'.money($value['price']).'</td>
			<td style="border: 1px solid #edebec;" align="right">'.$value['qty'].'</td>
			<td style="border: 1px solid #edebec;" align="right">'.money($value['total']).'</td>
		</tr>';
}

$html .= '<tr>
		<td style="border: 1px solid #edebec;" align="right" colspan="4">Subtotal</td>
		<td style="border: 1px solid #edebec;" align="right">'.money($model['total']).'</td>
	</tr>';
if ($model['promo_kode'] != '') {
	$html .= '<tr>
			<td style="border: 1px solid #edebec;" align="right" colspan="4">Discount<br>'.$model['promo_kode'].'</td>
			<td style="border: 1px solid #edebec;" align="right">'.money($model['discount_total']).'</td>
		</tr>';
}
// $html .= '<tr>
// 		<td style="border: 1px solid #edebec;" align="right" colspan="4">Shipping</td>
// 		<td style="border: 1px solid #edebec;" align="right">Rp 99,000,000.00</td>
// 	</tr>';
$html .= '<tr>
		<td style="border: 1px solid #edebec;" align="right" colspan="4">Grand Total</td>
		<td style="border: 1px solid #edebec;" align="right">'.money($model['grand_total']).'</td>
	</tr>
</table>
';
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');


// move pointer to last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
// echo __DIR__ . '/asdasda.pdf';
// $pdf->Output(__DIR__ . '/../images/pdf/asdasda.pdf', 'F');
@unlink(__DIR__.'/../images/pdf/'.$model['invoice_prefix'].$model['invoice_no'].'.pdf');
$pdf->Output(__DIR__.'/../images/pdf/'.$model['invoice_prefix'].$model['invoice_no'].'.pdf', 'F');

//============================================================+
// END OF FILE
//============================================================+
