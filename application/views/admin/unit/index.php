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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header justify-content-between">
                        <h3><?= $title; ?></h3>
                        <a href="<?= base_url('unit/add'); ?>" class="btn btn-primary">Tambah Data</a>
                    </div> 
                    <div class="card-body">
                        <table id="data_table" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Satuan</th>
                                    <th>Aksi</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <?php  $i = 1;
                                foreach ($unitData as $unit) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $unit->unit_name; ?></td>
                                        <td>
                                        <a href="<?= base_url('unit/edit/' . $unit->id); ?>" class="btn btn-success">Edit</a>
                                        <button class="btn btn-danger delete-unit" data-id="<?= $unit->id; ?>">Hapus</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        
<?php if ($this->session->flashdata("success")) : ?>
    <div class="flashdata" data-flashdata="<?= $this->session->flashdata("success"); ?>" data-type="success"></div>
<?php endif; ?>

<?php if ($this->session->flashdata("error")) : ?>
    <div class="flashdata" data-flashdata="<?= $this->session->flashdata("error"); ?>" data-type="error"></div>
<?php endif; ?>