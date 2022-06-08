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
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Solenoid</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">Status On</div>
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
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        loRa</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">Status Off</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa-solid fa-circle-nodes fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

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
                            <th>Id</th>
                            <th>Nama</th>
                            <th>Mac Address</th>
                            <th>Status</th>
                            <th>Last Online</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($device as $key => $data) { ?>
                            <tr>
                                <td><?= $data->id ?></td>
                                <td><?= $data->nama ?></td>
                                <td><?= $data->macAddr ?></td>
                                <td><?= $data->status_keterangan ?></td>
                                <td><?= $data->lastOnline ?></td>
                                <td>
                                    <!-- <a href="" class="btn btn-circle btn-sm btn-primary"><i class="fa-solid fa-circle-info"></i></a>
                                    <a onclick="return confirm('Yakin ingin menghapus data?')" href="<" class="btn btn-circle btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i></a> -->
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

    </div>
    <!-- End of Main Content -->