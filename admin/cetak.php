<?php
	require_once __DIR__ . '/vendor/autoload.php';

	require '../php/functions.php';
	$penemu = query("SELECT nomor, penemu, temuan, nama_negara, tahun_ditemukan, gambar_penemu FROM penemu_terkenal NATURAL JOIN negara");

	$html = '<!DOCTYPE html>
			<html>
			<head>
				<title>Penemu Penemu Terkenal</title>
				<link rel="stylesheet" type="text/css" href="../assets/css/print.css">
			</head>
			<body>
			<h1>PENEMU - PENEMU TERKENAL DI DUNIA</h1>
			<table align="center">
				<tr>
					<th>No</th>
					<th>Nama Penemu</th>
					<th>Temuan</th>
					<th>Asal Negara</th>
					<th>Tahun Ditemukan</th>
					<th>Foto Penemu</th>
				</tr>';

				foreach ($penemu as $pen) {
					$html .= '<tr>
								<td>'.  $pen["nomor"]  .'</td>
			 					<td>'.  $pen["penemu"]  .'</td>
			 					<td>'.  $pen["temuan"]  .'</td>
			 					<td>'.  $pen["nama_negara"]  .'</td>
			 					<td>'.  $pen["tahun_ditemukan"] . '</td>
			 					<td><img src="../assets/image/'. $pen["gambar_penemu"] .'" width="150px" height="200px"></td>
					</tr>';
				}

			$html .= '</table>

			</body>
			</html>';
	$mpdf = new \Mpdf\Mpdf();
	$mpdf->WriteHTML($html);
	$mpdf->Output();

?>