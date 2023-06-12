<?php
if (is_login()) exit(redirect(base_url('dashboard.php'))); // memanggil fungsi is_login() untuk mengetahui apakah sudah login atau belum
require '../library/class/User.php'; //  memanggil file class User
$userClass = new User($db->getConnection()); // memanggil class User
if (is_method('post')) {
    if (isset($_POST['login'])) {
        $userClass->username = $_POST['username'];
        $userClass->password = $_POST['password'];

        if ($userClass->login() == true) {
            $_SESSION['login'] = true; // set session $_SESSION['login'] menjadi true
            flashdata(['alert' => 'success', 'title' => 'Berhasil!', 'msg' => 'Login berhasil !.']);
            exit(redirect(base_url('dashboard.php')));
        } else {
            flashdata(['alert' => 'danger', 'title' => 'Gagal!','msg' => 'Username atau password tidak sesuai.']);
            exit(redirect(base_url('auth/login.php')));
        }
    }
    if (isset($_POST['register'])) {
        $userClass->name = $_POST['name'];
        $userClass->username = $_POST['username'];
        $userClass->password = $_POST['password'];

        if ($userClass->checkByUsername()) {
            flashdata(['alert' => 'danger', 'title' => 'Gagal!', 'msg' => 'Username sudah digunakan !.']);
            exit(redirect(base_url('auth/register.php')));
        } else {
            if ($userClass->register() == 'OK') {
                flashdata(['alert' => 'success', 'title' => 'Berhasil!', 'msg' => 'Register berhasil !.']);
                exit(redirect(base_url('auth/register.php')));
            } else {
                flashdata(['alert' => 'danger', 'title' => 'Gagal!','msg' => 'Username ata password is incorrect.']);
                exit(redirect(base_url('auth/register.php')));
            }
        }
    }
}