<div class="block-header">
	<h1>
		LAPORAN TRANSAKSI
	</h1>
</div>
<!-- Basic Examples -->
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card" style="border-radius: 20px;">
			<div class="body">
				<div class="row clearfix">
					<div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
						<div class="form-group">
							<label for="dari">Bulan</label>
							<select id="bulan" class="form-control show-tick" onchange="tgl()">
								<option value="">--Pilih Bulan--</option>
								<option value="01">Januari</option>
								<option value="02">Februari</option>
								<option value="03">Maret</option>
								<option value="04">April</option>
								<option value="05">Mei</option>
								<option value="06">Juni</option>
								<option value="07">Juli</option>
								<option value="08">Agustus</option>
								<option value="09">September</option>
								<option value="10">Oktober</option>
								<option value="11">November</option>
								<option value="12">Desember</option>
							</select>
						</div>
						<a href="javascript:cetak('tabel-laporan');" class="btn btn-primary waves-effect">
							<i class="material-icons">print</i>
							<span>Print</span>
						</a>
					</div>
					<div class="row clearfix">
						<div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
							<div class="form-group">
								<label for="sampai">Tahun</label>
								<select id="tahun" class="form-control" onchange="tgl()">
									<?php
									$mulai = date('Y') - 19;
									for ($i = $mulai; $i < $mulai + 20; $i++) {
										$sel = $i == date('Y') ? ' selected="selected"' : '';
										echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
									}
									?>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- #END# Basic Examples -->

	<div class="col-md-12" id="tabel-laporan">

	</div>
	<script type="text/javascript">
		function tgl() {
			$.ajax({
				url: "<?= site_url('transaksi/laporan') ?>",
				type: "POST",
				data: {
					bulan: $("#bulan").val(),
					tahun: $("#tahun").val()
				},
				success: function(data) {
					$("#tabel-laporan").html(data);
				}
			})
		}
	</script>