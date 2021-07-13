<!DOCTYPE html>
<html>

<head>
	<title></title>
</head>

<body>
	<div class="head">
		<p>FLASH LAUNDRY</p>
		<p> Personal and Professional Cleaning</p>
		<p>========================================</p>
	</div>
	<table>
		<tr>
			<td>Tanggal</td>
			<td>:</td>
			<td><?php echo date('d/m/Y'); ?></td>
		</tr>
		<tr>
			<td width="110px;">ID Transaksi</td>
			<td>:</td>
			<td><?= $val['id_transaksi']; ?></td>
		</tr>
		<tr>
			<td>Konsumen</td>
			<td>:</td>
			<td><?php echo $val['id_konsumen'] ?>(<?php echo $val['konsumen']; ?>)</td>
		</tr>

	</table>
	<p>---------------------------------------</p>
	<table>
		<tr>
			<td width="250px;">Paket</td>
			<td><?= $val['paket'] ?>, <?= number_format($val['harga'], 0, ",", ",") ?></td>
		</tr>
		<tr>
			<td width="250px;">Jumlah Kilo</td>
			<td style="float: right;"><?= $val['jml_kilo'] ?> Kg</td>
		</tr>
	</table>
	<p>---------------------------------------</p>
	<table>
		<tr>
			<td width="300px">Total</td>
			<td><?= number_format($val['total'], 0, ",", ","); ?></td>
		</tr>
	</table>
	<p>========================================</p>
	<p><?php
		date_default_timezone_set("Asia/Jakarta");
		echo date("d/m/y") ?> <?= $val['kasir'] ?>
	</p>
</body>

</html>
<style type="text/css">
	html,
	body {
		font-family: Courier New;
		color: #474747;
		width: 380px;
		height: 380px;
	}

	.head {
		text-transform: uppercase;
		text-align: center;
		margin: 0;
	}

	p {
		margin: 0;
		padding: 0;
	}
</style>
<script type="text/javascript">
	//window.load = window.print();
</script>