<?php
require '../config.php';
require '../layouts/header.php';
require '../library/class/User.php'; //  memanggil file class User
$userClass = new User($db->getConnection()); // memanggil class User

if (isset($_GET['id']) ) {
    $userClass->id = $_GET['id'];
    $data_user = $userClass->checkById(); // check by id user
    if ($data_user == false) { // jika data user tidak di temukan
        flashdata(['alert' => 'danger', 'title' => 'Gagal!', 'msg' => 'Data pengguna tidak tersedia!.']);
        exit(redirect(base_url('user/index.php')));
    } else if ($userClass->id == $_SESSION['user']['id']) { // jika data user yang di hapus sama dengan data user yang login saat ini maka tidak di perbolehkan
        flashdata(['alert' => 'danger', 'title' => 'Gagal!', 'msg' => 'Dilarang menghapus data sendiri!.']);
        exit(redirect(base_url('user/index.php')));
    } else {
        if ($userClass->delete()) {
            flashdata(['alert' => 'success', 'title' => 'Berhasil!', 'msg' => 'Data berhasil dihapus!.']);
            exit(redirect(base_url('user/index.php')));
        } else {
            flashdata(['alert' => 'danger', 'title' => 'Gagal!','msg' => 'Terjadi kesalahan pada sistem.']);
            exit(redirect(base_url('user/index.php')));
        }
    }
}
?>