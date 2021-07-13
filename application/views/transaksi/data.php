<div class="block-header">
    <h1>
        DATA transaksi
    </h1>
</div>
<!-- Basic Examples -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card" style="border-radius: 20px;">
            <div class="body">
                <a href="<?= site_url('transaksi/p/input'); ?>" class="btn btn-primary waves-effect" style="border-radius: 15px;">+TAMBAH</a>
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Transaksi</th>
                                <th>Kasir</th>
                                <th>Konsumen</th>
                                <th>Paket</th>
                                <th>Tanggal</th>
                                <th>Jumlah Kilo</th>
                                <th>Total Bayar</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($val as $data) {
                            ?>
                                <tr>
                                    <td width="10px"><?= $no++ ?></td>
                                    <td><?= $data->id_transaksi; ?></td>
                                    <td><?= $data->kasir; ?></td>
                                    <td><?= $data->konsumen; ?></td>
                                    <td><?= $data->paket; ?></td>
                                    <td><?= $data->tgl_transaksi; ?></td>
                                    <td><?= $data->jml_kilo; ?></td>
                                    <td><?= $data->total; ?></td>
                                    <td>
                                        <!-- <a href="<?= site_url('transaksi/p/input') ?>/<?= $data->id_transaksi ?>" class="btn btn-warning waves-effect">EDIT</a> -->
                                        <a href="<?= site_url('transaksi/hapus') ?>/<?= $data->id_transaksi ?>" class="btn btn-danger waves-effect" onclick="return confirm('Anda yakin ingin menghapus data!!')" style="border-radius: 15px;">HAPUS</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #END# Basic Examples -->