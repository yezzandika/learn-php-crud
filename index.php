<?php
require 'config.php';
if (is_login()) {
    flashdata(['alert' => 'danger', 'title' => 'Gagal!','msg' => 'Harap login terlebih dahulu.']);
    exit(redirect(base_url('auth/login.php')));
} else {
    exit(redirect(base_url('dashboard.php')));
}
