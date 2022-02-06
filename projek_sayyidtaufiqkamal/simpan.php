<?php

include "koneksi.php";
session_start();
switch ($_POST['simpan'])
{

	//pasien
	case 'pasien'   :
		$id = $_POST['id'];  $nama = $_POST['nama']; $alamat = $_POST['alamat'];
		$tempat_lahir = $_POST['tempat_lahir']; $tanggal_lahir = $_POST['tanggal_lahir']; 

		if (strlen($id)> 0){
			$sql=$koneksi->query("UPDATE pasien SET nama = '$nama',
									alamat = '$alamat', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir'
									WHERE id ='$id'; ");

		}else{
			$sql = $koneksi->query(" INSERT INTO pasien ( nama, alamat, tempat_lahir, tanggal_lahir) 
				VALUES ('$nama', '$alamat', '$tempat_lahir','$tanggal_lahir') ");	
		}		

	break;

	//dokter
	case 'dokter'   :
		$id = $_POST['id'];  $nama = $_POST['nama']; $alamat = $_POST['alamat'];
		$nip = $_POST['nip']; 

		if (strlen($id)> 0){
			$sql=$koneksi->query("UPDATE dokter SET nama = '$nama',
									alamat = '$alamat', nip = '$nip'
									WHERE id ='$id'; ");

		}else{
			$sql = $koneksi->query(" INSERT INTO dokter ( nama, alamat, nip) 
				VALUES ('$nama', '$alamat', '$nip') ");	
		}		

	break;

	//daftar
	case 'daftar'   :
		$id = $_POST['id'];  $id_pasien = $_POST['id_pasien']; $tanggal = $_POST['tanggal'];
		$nomor = $_POST['nomor'];  $keluhan = $_POST['keluhan']; 

		if (strlen($id)> 0){
			$sql=$koneksi->query("UPDATE daftar SET id_pasien = '$id_pasien',
									tanggal = '$tanggal', nomor = '$nomor', keluhan = '$keluhan'
									WHERE id ='$id'; ");

		}else{
			$sql = $koneksi->query(" INSERT INTO daftar ( id_pasien, tanggal, nomor, keluhan) 
				VALUES ('$id_pasien', '$tanggal', '$nomor', '$keluhan') ");	
		}		

	break;

}

?>