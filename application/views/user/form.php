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
                <form action="<?= site_url('user/proses')?>" method="post">
                    <?= $this->session->flashdata('pesan'); ?>
                    <div class="row form-group">
                        <label class="col-md-4 text-md-right" for="name">Nama Lengkap</label>
                        <div class="col-md-6">
                            <input value="<?= $row->name ?>" type="text" id="name" name="name" class="form-control" placeholder="Masukkan Name">
                            <?= form_error('name', '<span class="text-danger small">', '</span>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-4 text-md-right" for="phone">Nomor Telepon</label>
                        <div class="col-md-6">
                            <input value="<?= $row->phone ?>" type="number" id="phone" name="phone" class="form-control" placeholder="Masukkan Nomor">

                            <?= form_error('phone', '<span class="text-danger small">', '</span>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-4 text-md-right" for="username">Email</label>
                        <div class="col-md-6">
                            <input value="<?= $row->email ?>" type="text" id="email" name="email" class="form-control" placeholder="Masukkan Email">
                            <input type="hidden" value="<?= $row->phone ?>" name="nipedit">
                            <?= form_error('email', '<span class="text-danger small">', '</span>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-4 text-md-right" for="username">Password</label>
                        <div class="col-md-6">
                            <input value="<?= $row->password ?>" type="password" id="password" name="password" class="form-control" placeholder="Masukkan password">

                            <?= form_error('password', '<span class="text-danger small">', '</span>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-4 text-md-right" for="username">Re-Password</label>
                        <div class="col-md-6">
                            <input value="<?= $row->password ?>" type="password" id="password2" name="password2" class="form-control" placeholder="Masukkan ulang password">

                            <?= form_error('password2', '<span class="text-danger small">', '</span>'); ?>
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