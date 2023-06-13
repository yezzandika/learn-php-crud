<?php
require 'config.php';
if (is_login()) {
    exit(redirect(base_url('auth/login.php')));
} else {
    flashdata(['alert' => 'danger', 'title' => 'Gagal!','msg' => 'Username atau password tidak sesuai.']);
    exit(redirect(base_url('dashboard.php')));
}
