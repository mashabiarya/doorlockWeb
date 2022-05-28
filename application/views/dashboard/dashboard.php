<?php if (is_admin()) { ?>

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

    <div class="col-xl-8 col-lg-7">
        <!-- Area Chart -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pegawai Masuk</h6>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                </div>
                <hr>
                Styling for the area chart can be found in the
                <code>/js/demo/chart-area-demo.js</code> file.
            </div>
        </div>
    </div>

<?php } else { ?>

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

    <!-- Page Heading -->
    <h1 class="h4 mb-4 mt-4 text-gray-800">Koneksi Perangkat</h1>

    <!-- card -->
    <div class="row">

        <div class="col-lg-12">
            <div class="col-mb-4">
                <div class="card border-bottom-info shadow h-100 py-1">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php } ?>