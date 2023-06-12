<?php
require '../config.php';
unset($_SESSION['user']);
unset($_SESSION['login']);
session_destroy();
flashdata(['alert' => 'success', 'title' => 'Berhasil!','msg' => 'Logout berhasil dilakukan.']);
exit(redirect(base_url('auth/login.php')));