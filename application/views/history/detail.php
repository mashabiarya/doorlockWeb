<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
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
            <table class="table table-striped">
                <tr>
                    <td>Nama Karyawan</td>
                    <td>:</td>
                    <td><?= $detail->first_name ?> <?= $detail->last_name ?></td>
                </tr>
                <tr>
                    <td>NIP</td>
                    <td>:</td>
                    <td><?= $detail->nip ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td><?= $detail->gender ?></td>
                </tr>
                <tr>
                    <?php $date = new DateTime($detail->datime) ?>
                    <td>Waktu Masuk</td>
                    <td>:</td>
                    <td><?= $date->format('l, d-F-Y, G:ia ') ?></td>
                </tr>
                <tr>
                    <td>UID Kartu</td>
                    <td>:</td>
                    <td><?= $detail->uidCard ?></td>
                </tr>
                <tr>
                    <td>Perangkat</td>
                    <td>:</td>
                    <td><?= $detail->macAddr ?></td>
                </tr>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->