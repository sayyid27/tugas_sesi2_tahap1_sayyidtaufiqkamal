<?php
error_reporting(E_ALL & ~E_NOTICE);
include "koneksi.php"; 
switch ($_GET['hapus'])
{	

	case 'pasien' :	$id=$_GET['id'];				
					$sql = $koneksi->query(" DELETE from pasien where id = '$id' ");
	break;
	
	case 'dokter' :	$id=$_GET['id'];				
					$sql = $koneksi->query(" DELETE from dokter where id = '$id' ");
	break;

	case 'daftar' :	$id=$_GET['id'];				
					$sql = $koneksi->query(" DELETE from daftar where id = '$id' ");
	break;

	case 'proses' :	$id=$_GET['id'];				
					$sql = $koneksi->query(" DELETE from proses where id = '$id' ");
	break;
																															
}

?>