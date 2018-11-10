<?php
class database{
 
	var $host = "localhost";
	var $uname = "root";
	var $pass = "";
	var $db = "DATABASE NAME";
	var $connect = false;
 
	function __construct(){ //untuk memberi nilai awal dari properti
		$this->connect = mysqli_connect($this->host, $this->uname, $this->pass, $this->db);
	}

	function login($usname,$pswd){
		session_start();
		$sql = "SELECT * from admin where username = '$usname' AND password = '$pswd'";
		$d= mysqli_query($this->connect, $sql);
		$hasil = array();
		while($row = mysqli_fetch_array($d)){
			$hasil[] = $row;
		}
		foreach ($hasil as $h) {

		}
		if ($hasil == true) {
			$_SESSION['role'] = 'admin';
			$_SESSION['name'] = $h['name'];
			$_SESSION['username'] = $h['username'];
			$_SESSION['password'] = $h['password'];
			header('location:../D/index.php');
		}
		else{
			echo "<script>window.location ='../login.php?msg=Incorect!!!';</script>";

		}
		
	}
	function showAdmin($id){
		$sql = "SELECT * FROM `admin` where username = '$id'";
		$d= mysqli_query($this->connect, $sql);
		$hasil = array();
		while($row = mysqli_fetch_array($d)){
			$hasil[] = $row;
		}
		return $hasil;
	}
	function showPaket(){
		$sql = "SELECT * from paket ORDER BY id_paket DESC";
		$d= mysqli_query($this->connect, $sql);
		$hasil = array();
		while($row = mysqli_fetch_array($d)){
			$hasil[] = $row;
		}
		return $hasil;
	}
	function updateAdmin($u,$name,$alamat,$email,$no_telp){
		mysqli_query($this->connect,"UPDATE `admin` SET `name`= '$name',`email`= '$email',`no_telp`= '$no_telp',`alamat`= '$alamat' WHERE username = '$u'");
	}
	function updatePass($u, $pass){
		mysqli_query($this->connect,"UPDATE `admin` SET `password`= '$pass' WHERE username = '$u'");
	}
	function plusPaket($name,$minimal,$kaos,$jersey,$hodie,$zipper){
		mysqli_query($this->connect,"INSERT INTO `paket`(`nama_paket`, `minimal`, `kaos`, `jersey`, `hodie`, `zipper`) VALUES ('$name','$minimal','$kaos','$jersey','$hodie','$zipper')");
	}
	function upPaket($na,$minimal,$kaos,$jersey,$hodie,$zipper){
		mysqli_query($this->connect,"UPDATE `paket` SET `minimal`='$minimal',`kaos`='$kaos',`jersey`='$jersey',`hodie`='$hodie',`zipper`='$zipper' WHERE nama_paket = '$na'");
	}
	function delPaket($na){
		mysqli_query($this->connect,"DELETE FROM `paket` WHERE nama_paket = '$na'");
	}
	function newPost($vl,$judul){
		mysqli_query($this->connect,"INSERT INTO `konten`(`name`, `tgl_post`, `judul`) VALUES ('$vl',NOW(),'$judul')");
	}
	function updatePost($n,$j){
		mysqli_query($this->connect,"UPDATE `konten` SET `judul`='$j' WHERE name = '$n'");
	}
	function delPost($na){
		mysqli_query($this->connect,"DELETE FROM `konten` WHERE name = '$na'");
	}
	function showPost(){
		$sql = "SELECT * from konten ORDER BY id_konten DESC";
		$d= mysqli_query($this->connect, $sql);
		$hasil = array();
		while($row = mysqli_fetch_array($d)){
			$hasil[] = $row;
		}
		return $hasil;
	}
	function upload_image($n,$c,$k){
		mysqli_query($this->connect,"INSERT INTO `galeri`(`image`, `caption`, `kategori`,`tgl_up`) VALUES ('$n','$c','$k',NOW())");
	}
	function showGaleri(){
		$sql = "SELECT * from galeri";
		$d= mysqli_query($this->connect, $sql);
		$hasil = array();
		while($row = mysqli_fetch_array($d)){
			$hasil[] = $row;
		}
		return $hasil;
	}
	function delimage($i){
		mysqli_query($this->connect,"DELETE FROM `galeri` WHERE id_galeri = '$i'");
	}
}
?>