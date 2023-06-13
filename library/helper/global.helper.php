<?php 
## FUNGSI UNTUK MEMANGGIL URL UTAMA ##
if (!function_exists('base_url')) {
	function base_url(?string $i = null): ?string
    {    
        global $config;
	    return $config['base']['url'] . $i;
	}
}

## FUNGSI UNTUK MEMANGGIL URL YANG SAAT INI DI KUNJUNGI ##
if (!function_exists('current_url')) {
	function current_url(): ?string
    {    
        global $config, $_SERVER;
	    return $config['base']['url'] . ltrim($_SERVER['REQUEST_URI'], '/');
	}
}

## FUNCTION UNTUK MEMANGGIL ASSETS ##
if (!function_exists('asset')) {
	function asset(?string $i = null): ?string
    {    
		global $config;
	    return $config['base']['url'] . 'assets/' . $i;
	}
}

## FUNGSI UNTUK MENGETAHUI METODE PERMINTAAN YANG DI GUNAKAN ##
if (!function_exists('is_method')) {
    function is_method(string $method):bool  
    {
        if (strtolower($_SERVER['REQUEST_METHOD']) == strtolower($method)) return true;
        return false;
    }
}

## FUNGSI UNTUK MENGATUR SESSION HASIL DARI PESAN ##
if (!function_exists('flashdata')) {
    function flashdata(array $data): array {
		global $_SESSION;
        $_SESSION['result'] = $data;
        return $_SESSION['result'];
    }
}
## FUNGSI UNTUK MENAMPILKAN SESSION HASIL DARI PESAN ##
if (!function_exists('alert')) {
    function alert()
	{
		global $_SESSION;
        if (isset($_SESSION['result']) AND is_array($_SESSION['result'])) {
			print "<div class=\"alert alert-" . $_SESSION['result']['alert'] . " alert-dismissible fade show\" role=\"alert\">
				<strong>" . $_SESSION['result']['title'] . "</strong> " . $_SESSION['result']['msg'] . "
				<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
			</div>";
			unset($_SESSION['result']);
		}
    }
}

## FUNGSI UNTUK REDIRECT HALAMAN ##
if (!function_exists('redirect')) {
    function redirect(?string $location = null, int $delay = 0): string 
	{
        if($delay == 0) return header("Location: $location");
        return print "<meta http-equiv=\"refresh\" content=\"$delay;url=$location\">";
    }
}

## FUNGSI UNTUK MENGECEK APAKAH USER SUDAH MEMILIKI SESSION LOGIN ATAU BELUM ##
if (!function_exists('is_login')) {
    function is_login() {
        global $_SESSION;
        if (isset($_SESSION['login'])) return true;
        return false;
    }
}

## FUNGSI UNTUK MENDAPATKAN DATA USER ##
// if (!function_exists('user')) {
//     function user(?string $attr = null) {
//         global $_SESSION, $db;
// 		require 'library/class/User.php';
// 		$userClass = new User($db->getConnection()); 
//         if (!isset($_SESSION['user']['id'])) {
// 			return false;
// 		}
// 		$userClass->id = $_SESSION['user']['id'];
//         $user = $userClass->checkById();
//         if ($user == false) {
// 			return false;
// 		}
//         return !is_null($attr) ? $user[$attr] : $user['id'];
//     }
// }