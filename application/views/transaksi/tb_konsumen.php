<div class="modal-header">
    <h4 class="modal-title" id="defaultModalLabel">Data Konsumen</h4>
</div>

<div class="modal-body">
    <!-- Basic Examples -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID Konsumen</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Nomer Hp</th>
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
                    <td><?= $data->id_konsumen; ?></td>
                    <td><?= $data->nama; ?></td>
                    <td><?= $data->hp; ?></td>
                    <td><?= $data->alamat; ?></td>
                    <td>
                        <button class="btn btn-primary waves-effect" onclick="pilih('<?= $data->id_konsumen; ?>')" data-dismiss="modal">PILIH</button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<!-- #END# Basic Examples -->
</div>
