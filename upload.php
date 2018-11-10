<?php
	include'config_db.php';
	$db = new database();
		date_default_timezone_set('Asia/Jakarta');
    $time        = time();
    $nama_gambar = $_FILES['gambar'] ['name']; // Nama Gambar
    $size        = $_FILES['gambar'] ['size'];// Size Gambar
    $error       = $_FILES['gambar'] ['error'];
    $tipe_video  = $_FILES['gambar'] ['type']; //tipe gambar untuk filter
    $folder      = "../../RGB/images/galeri/"; //folder tujuan upload
    $valid       = array('jpg','png','gif','jpeg'); //Format File yang di ijinkan Masuk ke server
    $n ="img-".date('mhis')."-".$nama_gambar;
    if(strlen($nama_gambar)){   
      // Perintah untuk mengecek format gambar
      list($txt, $ext) = explode(".", $nama_gambar);
        if(in_array($ext,$valid)){
        // Perintah untuk mengecek size file gambar
          if($size>0){   
          // Perintah untuk mengupload gambar dan memberi nama baru
            $gambarnya = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
            $gmbr  = $folder.$gambarnya;
            $tmp = $_FILES['gambar']['tmp_name'];
            if(move_uploaded_file($tmp, $folder.$n)){   
              $db->upload_image($n, $_POST['caption'], $_POST['kategori']);
              header("location:../D/index.php");
            }
            else{ // Jika Gambar Gagal Di upload 
              header("location:../D/index.php");
            }
          }
          else{ // Jika Gambar melebihi size 
            header("location:../D/index.php");
          }   
        }
        else{ // Jika File Gambar Yang di Upload tidak sesuai eksistensi yang sudah di tetapkan
            header("location:../D/index.php");
        }
      }  
      else{ // Jika Gambar belum di pilih 
        header("location:../D/index.php");
      }       
?>