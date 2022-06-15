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
                <form action="" method="post">
                    <div class="row form-group">
                        <label class="col-md-4 text-md-right" for="username">Nama Lengkap</label>
                        <div class="col-md-6">
                            <input value="" type="text" id="username" name="first_name" class="form-control" placeholder="Nama Lengkap">
                            <input type="hidden" value="" name="">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-4 text-md-right" for="username">Lokasi</label>
                        <div class="col-md-6">
                            <input value="" type="text" id="username" name="first_name" class="form-control" placeholder="Lokasi">
                            <input type="hidden" value="" name="">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-4 text-md-right" for="username">Device</label>
                        <div class="col-md-6">
                            <select name="gender" class="form-control">
                                <option value="">-- Pilih Device --</option>
                                <option value="M">LoRa 1</option>
                                <option value="F">LoRa 2</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group justify-content-end">
                        <div class="col-md-8">
                            <button type="submit" name="" class="btn btn-primary btn-icon-split">
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