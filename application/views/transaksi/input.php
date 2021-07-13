<?php
if ($btn == "EDIT") {
    $val = $val->row_array();
} else {
    $val['id_transaksi'] = $no;
    $val['id_kasir'] = $this->session->userdata['id'];
    $val['id_konsumen'] = "";
    $val['id_paket'] = "";
    $val['tgl_transaksi'] = date('Y-m-d');
    $val['jml_kilo'] = "";
    $val['total'] = "";
}
?>

<div class="block-header">
    <h2><?= $title ?></h2>
</div>

<!-- Vertical Layout -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card" style="border-radius: 20px;">
            <div class="body">
                <?= form_open_multipart($url); ?>
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <label for="tgl_transaksi">Tanggal</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="date" name="tgl_transaksi" id="tgl_transaksi" value="<?= $val['tgl_transaksi']; ?>" class="form-control" placeholder="Y/M/D" readonly>
                            </div>
                        </div>

                        <label for="id_transaksi">ID Transaksi</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="id_transaksi" id="id_transaksi" value="<?= $val['id_transaksi']; ?>" class="form-control" readonly>
                            </div>
                        </div>

                        <label for="id_kasir">Kasir</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="id_kasir" id="id_kasir" value="<?= $val['id_kasir']; ?>" class="form-control" required="" readonly>
                            </div>
                        </div>

                        <label for="id_paket">Paket</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control " name="id_paket" id="id_paket" required="">
                                    <option value="">--Pilih--</option>
                                    <?php
                                    foreach ($paket as $x) {
                                        if ($val['id_paket'] == $x->id_paket) {
                                            $select = "selected";
                                        } else {
                                            $select = "";
                                        }
                                    ?>
                                        <option value="<?= $x->id_paket; ?>" <?= $select; ?>> <?= $x->nama; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <label for="jml_kilo">Jumlah Kilo</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="jml_kilo" id="jml_kilo" value="<?= $val['jml_kilo']; ?>" class="form-control" required="" onkeyup="kilo()">
                            </div>
                        </div>

                        <label for="total">Total</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="total" id="total" value="<?= $val['total']; ?>" class="form-control" required="" readonly>
                            </div>
                        </div>
                    </div>

                    <!-- Konsumen -->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <label for="id_konsumen">ID Konsumen</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="id_konsumen" id="id_konsumen" value="<?= $val['id_konsumen']; ?>" class="form-control" required="" data-toggle="modal" data-target="#defaultModal" onclick="klik()" readonly>
                            </div>
                        </div>
                        <label for="nama_konsumen">Nama</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nama_konsumen" id="nama_konsumen" value="" class="form-control" required="" readonly="">
                            </div>
                        </div>
                        <label for="alamat">Alamat</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="alamat" id="alamat" value="" class="form-control" required="" readonly="">
                            </div>
                        </div>
                        <label for="hp">Nomor Telefon</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="hp" id="hp" value="" class="form-control" required="" readonly="">
                            </div>
                        </div>
                    </div>
                    <!-- END Konsumen -->
                </div>

                <input type="submit" name="simpan" value="<?= $btn; ?>" class="btn btn-primary m-t-15 waves-effect" onclick="nota()" style="border-radius: 15px;">
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>
<!-- #END# Vertical Layout -->

<script type="text/javascript">
    function klik() {
        $.ajax({
            url: "<?= site_url('transaksi/modal_konsumen') ?>",
            success: function(data) {
                $(".modal-content").html(data);
            }
        });
    }

    function pilih(id) {
        $.ajax({
            url: "<?= site_url('transaksi/data_konsumen') ?>",
            type: "POST",
            dataType: "json",
            data: {
                id_konsumen: id
            },
            success: function(data) {
                $("#id_konsumen").val(data.id_konsumen);
                $("#nama_konsumen").val(data.nama);
                $("#hp").val(data.hp);
                $("#alamat").val(data.alamat);
            }
        })
    }

    function kilo() {
        paket = $("#id_paket").val();
        jml_kilo = $("#jml_kilo").val();
        if (paket == "") {
            alert("Pilih Paket Terlebih Dahulu");
        } else {
            $.ajax({
                url: "<?= site_url('transaksi/kilo') ?>",
                type: "POST",
                data: {
                    paket: paket,
                    jml_kilo: jml_kilo

                },
                success: function(data) {
                    $("#total").val(data);
                }
            })
        }
    }

    function nota() {
        var id_transaksi = $("#id_transaksi").val();
        var id_paket = $("#id_paket").val();
        var jml_kilo = $("#jml_kilo").val();
        if (id_paket == "" || jml_kilo == "") {

        } else {
            setInterval(function() {
                window.open('/transaksi/nota/' + id_transaksi, '_blank', 'width=400px,height=400px');
            }, 500);
        }
    }
</script>