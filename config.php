<?php
if(!isset($_SESSION)) { // cek kondisi apakah global variabel $_SESSION sudah tersedia atau belum
  session_start(); // inisiasi session  
}
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
$_ENV['production'] = false; // true or false;
date_default_timezone_set('Asia/Jakarta');
$config['base'] = [
    'app' => [
        'name' => 'SIMPLE CRUD PHP MYSQL',
        'description' => 'SIMPLE CRUD PHP MYSQL'
    ],
    'url' => 'http://localhost/learn-php-crud/'
];
$config['db'] = [
    'host' => 'localhost',
	'database' => 'learn_php_crud',
	'username' => 'root',
	'password' => ''
];

require 'library/class/DB.php';

$db = new DB($config);
require 'library/helper/global.helper.php'; // memanggil helper global.helper.php