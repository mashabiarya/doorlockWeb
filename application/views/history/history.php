<!-- Begin Page Content -->
<div class="container-fluid">

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
                            <th>id</th>
                            <th>NIP</th>
                            <th>Timestamp</th>
                            <th>Rssi</th>
                            <th>Snr</th>
                            <th>Mac Address</th>
                            <th>Uid Card</th>
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
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->