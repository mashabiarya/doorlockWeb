<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header bg-white py-3">
            <div class="row">
                <div class="col">
                    <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                        <?= $title; ?>
                    </h4>
                </div>
                <div class="col-auto">
                    <a href="<?= base_url('history') ?>" class="btn btn-sm btn-light btn-icon-split">
                        <span class="icon">
                            <i class="fa fa-arrow-left"></i>
                        </span>
                        <span class="text">
                            Kembali
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>NIP</th>
                            <th>Timestamp</th>
                            <th>Rssi</th>
                            <th>Snr</th>
                            <th>Mac Address</th>
                            <th>Uid Card</th>
                            <th>Waktu Transaksi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($history as $key => $data) { ?>
                            <tr>
                                <td><?= $data->id ?></td>
                                <td><?= $data->nip ?></td>
                                <td><?= $data->timestamp ?></td>
                                <td><?= $data->rssi ?></td>
                                <td><?= $data->snr ?></td>
                                <td><?= $data->macAddr ?></td>
                                <td><?= $data->uidCard ?></td>
                                <td><?= $data->datime ?></td>
                                <td>
                                    <a href="<?= site_url('history/detail/' . $data->id) ?>" class="btn btn-circle btn-sm btn-primary"><i class="fa-solid fa-circle-info"></i></a>
                                    <a onclick="return confirm('Yakin ingin menghapus data?')" href="<?= base_url('history/del/') . $data->id ?>" class="btn btn-circle btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->