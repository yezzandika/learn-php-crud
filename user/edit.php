<?php
require '../config.php';
require '../layouts/header.php';
require '../library/class/User.php'; //  memanggil file class User
$userClass = new User($db->getConnection()); // memanggil class User

if (isset($_GET['id']) ) {
    $userClass->id = $_GET['id'];
    $data_user = $userClass->checkById();
    if ($data_user == false) {
        flashdata(['alert' => 'danger', 'title' => 'Gagal!', 'msg' => 'Data pengguna tidak tersedia!.']);
        exit(redirect(base_url('user/index.php')));
    }
}
if (is_method('post')) {
    if (isset($_POST['edit'])) {
        $userClass->id = $_POST['id'];
        $userClass->name = $_POST['name'];
        $userClass->username = $_POST['username'];
        $userClass->password = $_POST['password'];

        if ($userClass->checkByUsername() AND $data_user['username'] <> $_POST['username']) {
            flashdata(['alert' => 'danger', 'title' => 'Gagal!', 'msg' => 'Username sudah digunakan !.']);
            exit(redirect(base_url('user/index.php')));
        } else {
            if ($userClass->update()) {
                flashdata(['alert' => 'success', 'title' => 'Berhasil!', 'msg' => 'Data berhasil diubah!.']);
                exit(redirect(base_url('user/index.php')));
            } else {
                flashdata(['alert' => 'danger', 'title' => 'Gagal!','msg' => 'Terjadi kesalahan pada sistem.']);
                exit(redirect(current_url()));
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
                    Edit Pengguna <?= $data_user['username'] ?>
                </h5>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <?= alert() ?>
                    <div class="row">
                        <input type="hidden" name="id" value="<?= $data_user['id'] ?>">
                        <div class="form-group col-12">
                            <label for="">Nama Lengkap</label>
                            <input class="form-control" type="text" name="name" placeholder="Nama Lengkap" value="<?= $data_user['name'] ?>" required>
                        </div>
                        <div class="form-group col-12">
                            <label for="">Username </label>
                            <input class="form-control" type="text" name="username" placeholder="Username" value="<?= $data_user['username'] ?>" required>
                        </div>
                        <div class="form-group col-12">
                            <label for="">Password </label>
                            <input class="form-control" type="password" name="password" placeholder="Password" value="<?= $data_user['password'] ?>" required>
                        </div>
                        <div class="form-group col-12 my-2">
                            <button class="btn btn-primary float-end" name="edit">
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