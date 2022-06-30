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
                    <a href="<?= base_url('perso') ?>" class="btn btn-sm btn-light btn-icon-split">
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
                    <td><?= $detail->emp_no ?></td>
                </tr>
                <tr>
                    <td>Nomor Seri</td>
                    <td>:</td>
                    <td><?= $detail->serial ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td><?php
                        $detail->gender == "M";
                        if ($detail->gender == "M") {
                            echo "Laki - laki";
                        } else {
                            echo "Perempuan";
                        }
                        ?></td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>:</td>
                    <td><?= $detail->birth_date ?></td>
                </tr>
                <tr>
                    <td>Tanggal Rekrut</td>
                    <td>:</td>
                    <td><?= $detail->hire_date ?></td>
                </tr>
                <tr>
                    <td>Expired</td>
                    <td>:</td>
                    <td><?= $detail->expired ?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td><?php
                        $detail->active == "1";
                        if ($detail->active == "1") {
                            echo "Aktif";
                        } else {
                            echo "Nonaktif";
                        }
                        ?></td>
                </tr>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->