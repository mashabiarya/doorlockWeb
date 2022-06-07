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
                        <a href="<?= base_url('user') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                <!-- <form action="<?= site_url('karyawan/proses') ?>" method="post"> -->
                <?php if ($page == 'add') { ?>
                    <div class="row form-group">
                        <label class="col-md-4 text-md-right" for="username">Id</label>
                        <div class="col-md-6">
                            <input value="<?= $nip ?>" type="text" id="username" name="id" class="form-control" placeholder="Username" readonly>
                            <?= form_error('username', '<span class="text-danger small">', '</span>'); ?>
                        </div>
                    </div>
                <?php } ?>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="username">Nama Lengkap</label>
                    <div class="col-md-6">
                        <input value="<?= $row->name ?>" type="text" id="username" name="name" class="form-control" placeholder="Nama Lengkap">
                        <input type="hidden" value="<?= $row->name ?>" name="nipedit">
                        <?= form_error('username', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="username">Nomor Telepon</label>
                    <div class="col-md-6">
                        <input value="<?= $row->phone ?>" type="text" id="username" name="name" class="form-control" placeholder="Nama Lengkap">
                        <input type="hidden" value="<?= $row->phone ?>" name="nipedit">
                        <?= form_error('username', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <?php if ($page == 'add') { ?>
                    <div class="row form-group">
                        <label class="col-md-4 text-md-right" for="username">Tanggal Ditambahkan</label>
                        <div class="col-md-6">
                            <input value="" type="date" id="username" name="date_created" class="form-control" placeholder="Nama Belakang">
                            <?= form_error('username', '<span class="text-danger small">', '</span>'); ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($page == 'add') { ?>
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
                <?php } ?>
                </form>
            </div>
        </div>
    </div>
</div>