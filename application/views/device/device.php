    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h4 mb-4 text-gray-800"><?= $title; ?></h1>

        <!-- card -->
        <div class="row">
            <div class="col-lg-6">
                <div class="col-mb-4">
                    <div class="card border-bottom-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">LoRa 1</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 text-center"><?= strtoupper($stat_mesin1) ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-door-open fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="col-mb-4">
                    <div class="card border-bottom-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">LoRa 2</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 text-center"><?= strtoupper($stat_mesin2) ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-door-open fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->

    <div class="container-fluid" style="margin-top: 20px;">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
            </div>
            <div class="card-body">
                <div class="col-auto">
                    <a href="<?= site_url('device/regis') ?>" class="btn btn-sm btn-primary btn-icon-split">
                        <span class="icon">
                            <i class="fa fa-user-plus"></i>
                        </span>
                        <span class="text">
                            Registrasi Device
                        </span>
                    </a>
                </div><br>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Perangkat</th>
                                <th>Mac Address</th>
                                <th>Lokasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($device as $key => $data) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data->nama ?></td>
                                    <td><?= $data->macAddr ?></td>
                                    <td>LT <?= $data->lokasi ?></td>
                                    <td>
                                        <a href="<?= site_url('device/edit/' . $data->id) ?>" class="btn btn-circle btn-sm btn-warning"><i class="fa fa-fw fa-edit"></i></a>
                                        <a onclick="return confirm('Yakin ingin menghapus data?')" href="<?= base_url('device/del/') . $data->id ?>" class="btn btn-circle btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>