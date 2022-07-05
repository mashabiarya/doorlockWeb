<?php if (is_admin()) { ?>

  <!-- Page Heading -->
  <h1 class="h4 mb-4 text-gray-800"><?= $title; ?></h1>

  <!-- card -->
  <div class="row">

    <?php
    foreach ($mesin as $key => $data) {
      if ($data->macAddr != 'dc:a6:32:bb:af:e1') {
    ?>
        <div class="col-lg-6" style="margin-top: 15px;">
          <div class="col-mb-4">
            <div class="card border-bottom-info shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?= $data->nama ?></div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">
                      <?php if ($data->status_keterangan == 'active') {
                        echo 'ON <a href="#" title="Device is active" class="btn btn-circle btn-sm btn-success"><i class="fa fa-fw fa-power-off"></i></a>';
                      } elseif ($data->status_keterangan == null) {
                        echo 'OFF <a href="#" title="Device is inactive" class="btn btn-circle btn-sm btn-secondary readonly"><i class="fa fa-fw fa-power-off"></i></a>';
                      }
                      ?>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-door-open fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    <?php
      }
    } ?>
    <!-- <div class="col-lg-6">
    <div class="col-mb-4">
        <div class="card border-bottom-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">LoRa 1</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-center"><?= empty($stat_mesin1) ? 'NONAKTIF' : strtoupper($stat_mesin1) ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-door-open fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
    <!-- <div class="col-lg-6">
    <div class="col-mb-4">
        <div class="card border-bottom-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">LoRa 2</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-center"><?= empty($stat_mesin2) ? 'NONAKTIF' : strtoupper($stat_mesin2) ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-door-open fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
  </div><br>

  <!-- Page Heading -->
  <h1 class="h4 mb-4 mt-4 text-gray-800"></h1>

  <div class="row">
    <div class="col-xl-6 col-lg-6">
      <!-- Area Chart -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Pegawai Masuk</h6>
        </div>
        <div class="card-body">
          <div class="chart-area">
            <canvas id="pegawaiBarChart"></canvas>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-6 col-lg-6">
      <!-- Area Chart -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Pegawai Masuk</h6>
        </div>
        <div class="card-body">
          <div class="chart-area">
            <canvas id="pegawaiPieChart"></canvas>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-6 col-lg-6">
      <!-- Area Chart -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">RSSI & SNR LoRa 1</h6>
        </div>
        <div class="card-body">
          <div class="chart-area">
            <canvas id="mesin1AreaChart"></canvas>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-6 col-lg-6">
      <!-- Area Chart -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">RSSI & SNR LoRa 2</h6>
        </div>
        <div class="card-body">
          <div class="chart-area">
            <canvas id="mesin2AreaChart"></canvas>
          </div>
        </div>
      </div>
    </div>

  </div>

<?php } else { ?>

  <!-- Page Heading -->
  <h1 class="h4 mb-4 text-gray-800"><?= $title; ?></h1>

  <!-- card -->
  <div class="row">

    <?php
    foreach ($mesin as $key => $data) {
      if ($data->macAddr != 'dc:a6:32:bb:af:e1') {
    ?>
        <div class="col-lg-6" style="margin-top: 15px;">
          <div class="col-mb-4">
            <div class="card border-bottom-info shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?= $data->nama ?></div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">
                      <?php if ($data->status_keterangan == 'active') {
                        echo 'ON <a href="#" title="Device is active" class="btn btn-circle btn-sm btn-success"><i class="fa fa-fw fa-power-off"></i></a>';
                      } elseif ($data->status_keterangan == null) {
                        echo 'OFF <a href="#" title="Device is inactive" class="btn btn-circle btn-sm btn-secondary readonly"><i class="fa fa-fw fa-power-off"></i></a>';
                      }
                      ?>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-door-open fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    <?php
      }
    } ?>
    <!-- <div class="col-lg-6">
  <div class="col-mb-4">
      <div class="card border-bottom-info shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">LoRa 1</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800 text-center"><?= empty($stat_mesin1) ? 'NONAKTIF' : strtoupper($stat_mesin1) ?></div>
                  </div>
                  <div class="col-auto">
                      <i class="fas fa-door-open fa-2x text-gray-300"></i>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div> -->
    <!-- <div class="col-lg-6">
  <div class="col-mb-4">
      <div class="card border-bottom-info shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">LoRa 2</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800 text-center"><?= empty($stat_mesin2) ? 'NONAKTIF' : strtoupper($stat_mesin2) ?></div>
                  </div>
                  <div class="col-auto">
                      <i class="fas fa-door-open fa-2x text-gray-300"></i>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div> -->
  </div><br>

  <!-- Page Heading -->
  <h1 class="h4 mb-4 mt-4 text-gray-800"></h1>

  <div class="row">
    <div class="col-xl-6 col-lg-6">
      <!-- Area Chart -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Pegawai Masuk</h6>
        </div>
        <div class="card-body">
          <div class="chart-area">
            <canvas id="pegawaiBarChart"></canvas>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-6 col-lg-6">
      <!-- Area Chart -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Pegawai Masuk</h6>
        </div>
        <div class="card-body">
          <div class="chart-area">
            <canvas id="pegawaiPieChart"></canvas>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-6 col-lg-6">
      <!-- Area Chart -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">RSSI & SNR LoRa 1</h6>
        </div>
        <div class="card-body">
          <div class="chart-area">
            <canvas id="mesin1AreaChart"></canvas>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-6 col-lg-6">
      <!-- Area Chart -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">RSSI & SNR LoRa 2</h6>
        </div>
        <div class="card-body">
          <div class="chart-area">
            <canvas id="mesin2AreaChart"></canvas>
          </div>
        </div>
      </div>
    </div>

  </div>


<?php } ?>