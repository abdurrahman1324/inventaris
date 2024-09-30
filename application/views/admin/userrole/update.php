<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-inbox bg-blue"></i>
                        <div class="d-inline">
                            <h5><?= $title; ?></h5>
                            <span><?= $desc; ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?= base_url ('dashboard'); ?>">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3><?= $title; ?></h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="name">Nama User Role</label>
                                <input type="text" class="form-control <?= form_error('name') ? 'is-invalid' : ''; ?>" id="name" 
                                name="name" placeholder="Masukan nama user role" value="<?= set_value('name') ? set_value('name') : $role->role_name; ?>" />
                                <div class="invalid-feedback">
                                    <?= form_error('name'); ?>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                            <a href="<?= base_url('role'); ?>" class="btn btn-danger">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>