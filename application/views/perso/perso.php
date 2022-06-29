    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Emp_no</th>
                            <th>Tanggal</th>
                            <th>Expired</th>
                            <th>Active</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($perso as $key => $data) { ?>
                            <tr>
                                <td><?= $data->serial ?></td>
                                <td><?= $data->emp_no ?></td>
                                <td><?= $data->tanggal ?></td>
                                <td><?= $data->expired ?></td>
                                <td><?= $data->active ?></td>
                                <td>
                                    <a href="<?= site_url('perso/detail/' . $data->serial) ?>" class="btn btn-circle btn-sm btn-primary"><i class="fa-solid fa-circle-info"></i></a>
                                    <a onclick="return confirm('Yakin ingin menghapus data?')" href="<?= base_url('perso/del/') . $data->serial ?>" class="btn btn-circle btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->