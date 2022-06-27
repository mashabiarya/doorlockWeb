<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm mb-4 border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h6 align-middle m-0 font-weight-bold text-primary">
                            Form Registrasi Device
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('device') ?>" class="btn btn-sm btn-light btn-icon-split">
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
            <div class="card-body pb-2">
                <?= $this->session->flashdata('pesan'); ?>
                <form action="<?= site_url('device/proses') ?>" method="post">
                    <div class="row form-group">
                        <label class="col-md-4 text-md-right" for="username">Nama Device</label>
                        <div class="col-md-6">
                            <input value="<?= $row->nama ?>" type="text" min="1" max="8" id="lokasi" name="device" class="form-control" placeholder="Masukkan Nama Device">
                            <input type="hidden" value="<?= $row->id ?>" name="id">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-4 text-md-right" for="username">Masukkan Mac Address</label>
                        <div class="col-md-6">
                            <input value="" type="text" id="lokasi" name="macAddr" class="form-control" placeholder="Masukan Mac Address">
                            <?php
                            if ($page == 'edit') { ?>
                                <small style="color:brown;">Biarkan kosong jika tidak ada perubahan</small>
                            <?php }
                            ?>

                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-4 text-md-right" for="username">Lokasi</label>
                        <div class="col-md-6">
                            <input value="<?= $row->lokasi ?>" type="number" min="1" max="8" id="lokasi" name="lokasi" class="form-control" placeholder="Masukan Lokasi (1 sampai 8)">
                            <input type="hidden" value="" name="">
                        </div>
                    </div>
                    <div class="row form-group justify-content-end">
                        <div class="col-md-8">
                            <button type="submit" name="<?= $page ?>" class="btn btn-primary btn-icon-split">
                                <span class="icon"><i class="fa fa-save"></i></span>
                                <span class="text">Simpan</span>
                            </button>
                            <button type="reset" class="btn btn-secondary">
                                Reset
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>