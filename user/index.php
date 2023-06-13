<?php
require '../config.php';
if (is_login() == false) {
    exit(redirect(base_url('auth/login.php')));
}
require '../layouts/header.php';
require '../library/class/User.php'; //  memanggil file class User
$userClass = new User($db->getConnection()); // memanggil class User
?>
<div class="row justify-content-center">
    <div class="col-md-12">
        <?= alert() ?>
    </div>
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-primary">
                <h5 class="card-title text-white">
                    Pengguna
                </h5>
            </div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <a href="<?= base_url('user/create.php') ?>" class="btn btn-success btn-md"> Tambah</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Username</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $rows = $userClass->get_all();
                            foreach ($rows as $row) {
                            ?>
                                <tr>
                                    <td class="text-center"><?php echo $no; ?></td>
                                    <td class="text-center"><?php echo $row['name']; ?></td>
                                    <td class="text-center"><?php echo $row['username']; ?></td>
                                    <td class="text-center">
                                        <a href="<?php echo base_url('user/edit.php?id=' . $row['id']) ?>" class="btn btn-warning btn-md"> Edit</a>
                                        <a href="<?php echo base_url('user/delete.php?id=' . $row['id']) ?>" class="btn btn-danger btn-md" onclick="confirm('Apakah kamu yakin akan menghapus data ini?')"> Hapus</a>
                                    </td>
                                </tr>
                            <?php $no++; ?>
                            <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require '../layouts/footer.php';
?>