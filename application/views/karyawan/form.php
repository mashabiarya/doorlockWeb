<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm mb-4 border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form <?= $title; ?>
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('karyawan') ?>" class="btn btn-sm btn-light btn-icon-split">
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
                <!-- <?= $this->session->flashdata('pesan'); ?> -->
                <form action="<?= site_url('karyawan/proses') ?>" method="post">
                    <?php if ($page == 'add') { ?>
                        <div class="row form-group">
                            <label class="col-md-4 text-md-right" for="username">nip_karyawan</label>
                            <div class="col-md-6">
                                <input value="<?= $emp_no ?>" type="text" id="username" name="emp_no" class="form-control" placeholder="Username" readonly>
                                <?= form_error('username', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="row form-group">
                        <label class="col-md-4 text-md-right" for="username">Nama Depan</label>
                        <div class="col-md-6">
                            <input value="<?= $row->first_name ?>" type="text" id="username" name="first_name" class="form-control" placeholder="Nama Depan">
                            <input type="hidden" value="<?= $row->emp_no ?>" name="emp_noedit">
                            <?= form_error('username', '<span class="text-danger small">', '</span>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-4 text-md-right" for="username">Nama Belakang</label>
                        <div class="col-md-6">
                            <input value="<?= $row->last_name ?>" type="text" id="username" name="last_name" class="form-control" placeholder="Nama Belakang">
                            <?= form_error('username', '<span class="text-danger small">', '</span>'); ?>
                        </div>
                    </div>
                    <?php if ($page == 'add') { ?>
                        <div class="row form-group">
                            <label class="col-md-4 text-md-right" for="username">Jenis Kelamin</label>
                            <div class="col-md-6">
                                <select name="gender" class="form-control">
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="M">Laki - Laki</option>
                                    <option value="F">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-4 text-md-right" for="username">Tanggal Lahir</label>
                            <div class="col-md-6">
                                <input value="" type="date" id="username" name="birth_date" class="form-control" placeholder="Nama Belakang">
                                <?= form_error('username', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-4 text-md-right" for="username">Tanggal Rekrut</label>
                            <div class="col-md-6">
                                <input value="" type="date" id="username" name="hire_date" class="form-control" placeholder="Nama Belakang">
                                <?= form_error('username', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                        </div>
                    <?php } ?>
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