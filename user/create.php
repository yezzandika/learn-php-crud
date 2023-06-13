<?php
require '../config.php';
require '../layouts/header.php';
require '../library/class/User.php'; //  memanggil file class User
$userClass = new User($db->getConnection()); // memanggil class User
if (is_method('post')) {
    if (isset($_POST['create'])) {
        $userClass->name = $_POST['name'];
        $userClass->username = $_POST['username'];
        $userClass->password = $_POST['password'];
        if ($userClass->checkByUsername()) {
            flashdata(['alert' => 'danger', 'title' => 'Gagal!', 'msg' => 'Username sudah digunakan !.']);
            exit(redirect(base_url('user/create.php')));
        } else {
            if ($userClass->create()) {
                flashdata(['alert' => 'success', 'title' => 'Berhasil!', 'msg' => 'Data berhasil ditambahkan!.']);
                exit(redirect(base_url('user/index.php')));
            } else {
                flashdata(['alert' => 'danger', 'title' => 'Gagal!','msg' => 'Terjadi kesalahan pada sistem!.']);
                exit(redirect(base_url('user/index.php')));
            }
        }
    }
}
?>
<div class="row justify-content-center">
    <div class="col-md-12 mb-3">
        <a href="<?= base_url('user/index.php') ?>" class="btn btn-warning">
            Kembali
        </a>
    </div>
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-primary">
                <h5 class="card-title text-white">
                    Tambah Pengguna
                </h5>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <?= alert() ?>
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="">Nama Lengkap</label>
                            <input class="form-control" type="text" name="name" placeholder="Nama Lengkap" required>
                        </div>
                        <div class="form-group col-12">
                            <label for="">Username </label>
                            <input class="form-control" type="text" name="username" placeholder="Username" required>
                        </div>
                        <div class="form-group col-12">
                            <label for="">Password </label>
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group col-12 my-2">
                            <button class="btn btn-primary float-end" name="create">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
require '../layouts/footer.php';
?>