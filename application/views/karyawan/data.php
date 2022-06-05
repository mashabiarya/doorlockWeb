<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="col-auto">
                    <a href="<?= site_url('karyawan/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                        <span class="icon">
                            <i class="fa fa-user-plus"></i>
                        </span>
                        <span class="text">
                            Tambah Karyawan
                        </span>
                    </a>
                </div><br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NIP</th>
                            <th>Tanggal Lahir</th>
                            <th>Nama Depan</th>
                            <th>Nama Belakang</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Rekrut</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($karyawan as $key => $data) { ?>
                            <tr>
                                <td><?= $data->nip ?></td>
                                <td><?= $data->birth_date ?></td>
                                <td><?= $data->first_name ?></td>
                                <td><?= $data->last_name ?></td>
                                <td><?= $data->gender ?></td>
                                <td><?= $data->hire_date ?></td>
                                <td>
                                    <a href="<?= base_url('karyawan/edit/') . $data->nip ?>" class="btn btn-circle btn-sm btn-warning"><i class="fa fa-fw fa-edit"></i></a>
                                    <a onclick="return confirm('Yakin ingin menghapus data?')" href="<?= base_url('karyawan/del/') . $data->nip ?>" class="btn btn-circle btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i></a>
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