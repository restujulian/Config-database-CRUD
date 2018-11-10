<?php 
include 'config_db.php';
$db = new database();
 /*Tambah admin*/

$aksi = $_GET['aksi'];
 if($aksi == "up"){
 	$db->updateAdmin($_GET['u'],$_POST['name'],$_POST['alamat'],$_POST['email'],$_POST['no_telp']);
 	header('location:../D/index.php');
 }elseif ($aksi == "us") {
 	$db->updatePass($_GET['u'],$_POST['newpsswd']);
 	header('location:../D/index.php');
 }elseif ($aksi == "plus") {
 	$db->plusPaket($_POST['name'],$_POST['minimal'],$_POST['kaos'],$_POST['jersey'],$_POST['hodie'],$_POST['zipper']);
 	header('location:../D/index.php');
 }elseif ($aksi == "uppkt") {
 	$db->upPaket($_GET['na'],$_POST['minimal'],$_POST['kaos'],$_POST['jersey'],$_POST['hodie'],$_POST['zipper']);
 	header('location:../D/index.php');
 }elseif ($aksi == "hps") {
 	$db->delPaket($_GET['na']);
 	header('location:../D/index.php');
 }elseif ($aksi == "hpskonten") {
 	$db->delPost($_GET['i']);
 	$file = '../D/konten/'.$_GET['i'];
	unlink($file);
 	header('location:../D/index.php');
 }elseif ($aksi == "hpsimg") {
 	$db->delimage($_GET['i']);
 	$file = '../../RGB/images/galeri/'.$_GET['f'];
	unlink($file);
 	header('location:../D/index.php');
 }
?>