<?php
if(isset($_GET['open'])) {
	switch ($_GET['open']){	
		default			: if(!file_exists ("beranda.php")) die ("File tidak ada"); 
								include "beranda.php"; break;

		case '' 		: if(!file_exists ("beranda.php")) die ("File tidak ada"); 
								include "beranda.php"; break;

		case 'pasien'   :if(!file_exists ("pasien.php")) die ("File tidak ada"); 
								include "pasien.php";  break;

		case 'dokter'   :if(!file_exists ("dokter.php")) die ("File tidak ada"); 
								include "dokter.php";  break;

		case 'daftar'   :if(!file_exists ("daftar.php")) die ("File tidak ada"); 
								include "daftar.php";  break;
								


		case 'pesan'   :if(!file_exists ("pesan.php")) die ("File tidak ada"); 
								include "pesan.php";  break;

		case 'cekpesan'   :if(!file_exists ("cekpesan.php")) die ("File tidak ada"); 
								include "cekpesan.php";  break;

								

	}
}
else { 
	if(!file_exists ("beranda.php")) die ("File tidak ada");  
		include "beranda.php"; 
}
?>