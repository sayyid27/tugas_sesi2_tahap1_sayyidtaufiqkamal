<?php
session_start();
include "koneksi.php";
switch ($_GET['data'])
{
//pasien
case 'pasien'   : 
  $sql = $koneksi->query("SELECT *,'' as aksi FROM pasien")->fetch_all(MYSQLI_ASSOC); 
  $kirim=array('data' => $sql); 
  echo json_encode($kirim);                       

break;

case 'editpasien'   :   
  $id=$_GET['id'];
  $sql = $koneksi->query("SELECT * FROM pasien where id ='$id'")->fetch_assoc(); 
  echo json_encode($sql);                       

break;

case 'selectpasien'   :  
  $sql = $koneksi->query("SELECT id as id,nama as text FROM pasien")->fetch_all(MYSQLI_ASSOC);
  $kirim=array('pasien' => $sql); 
  echo json_encode($kirim);

break;

//dokter
case 'dokter'   : 
  $sql = $koneksi->query("SELECT *,'' as aksi FROM dokter")->fetch_all(MYSQLI_ASSOC); 
  $kirim=array('data' => $sql); 
  echo json_encode($kirim);                       

break;

case 'editdokter'   :   
  $id=$_GET['id'];
  $sql = $koneksi->query("SELECT * FROM dokter where id ='$id'")->fetch_assoc(); 
  echo json_encode($sql);                       

break;

case 'selectdokter'   :  
  $sql = $koneksi->query("SELECT id as id,nama as text FROM dokter ")->fetch_all(MYSQLI_ASSOC);
  $kirim=array('dokter' => $sql); 
  echo json_encode($kirim);

break;

//daftar
case 'daftar'   : 
  $sql = $koneksi->query("SELECT a.*,b.nama as nama_pasien,'' as aksi 
                          FROM daftar a left join pasien b on a.id_pasien=b.id")->fetch_all(MYSQLI_ASSOC); 
  $kirim=array('data' => $sql); 
  echo json_encode($kirim);                       

break;

case 'editdaftar'   :   
  $id=$_GET['id'];
  $sql = $koneksi->query("SELECT * FROM daftar where id ='$id'")->fetch_assoc(); 
  echo json_encode($sql);                       

break;


}

?>