<?php
  session_start();
  session_destroy();
  header("location:../index.php"); // mengambalikan ke form_login.php
 ?>