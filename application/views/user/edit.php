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
                <form action="" method="post">
                    <div class="row form-group">
                        <label class="col-md-4 text-md-right" for="nama">Nama</label>
                        <div class="col-md-6">
                            <input value="<?= set_value('name', $user['name']); ?>" type="text" id="name" name="name" class="form-control" placeholder="name">
                            <?= form_error('name', '<span class="text-danger small">', '</span>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-4 text-md-right" for="email">Email</label>
                        <div class="col-md-6">
                            <input value="<?= set_value('email', $user['email']); ?>" type="text" id="email" name="email" class="form-control" placeholder="Email">
                            <?= form_error('email', '<span class="text-danger small">', '</span>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-4 text-md-right" for="no_telp">Nomor Telepon</label>
                        <div class="col-md-6">
                            <input value="<?= set_value('phone', $user['phone']); ?>" type="text" id="phone" name="phone" class="form-control" placeholder="Nomor Telepon">
                            <?= form_error('phone', '<span class="text-danger small">', '</span>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-4 text-md-right" for="role">Role</label>
                        <div class="col-md-6">
                            <div class="custom-control custom-radio">
                                <input <?= $user['role_id'] == '1' ? 'checked' : ''; ?> <?= set_radio('role_id', 'admin'); ?> value="admin" type="radio" id="admin" name="role_id" class="custom-control-input">
                                <label class="custom-control-label" for="admin">Admin</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input <?= $user['role_id'] == '2' ? 'checked' : ''; ?> <?= set_radio('role_id', 'gudang'); ?> value="user" type="radio" id="gudang" name="role_id" class="custom-control-input">
                                <label class="custom-control-label" for="gudang">Gudang</label>
                            </div>
                            <?= form_error('role_id', '<span class="text-danger small">', '</span>'); ?>
                        </div>
                    </div>
                    <br>
                    <div class="row form-group justify-content-end">
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary btn-icon-split">
                                <span class="icon"><i class="fa fa-save"></i></span>
                                <span class="text">Simpan</span>
                            </button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>