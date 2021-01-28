<?php
//Proteksi halaman dengan library Simple_login.php
$this->simple_login->cek_login();

//digabungkan jadi satu
require_once('head.php');
require_once('header.php');
require_once('nav.php');
require_once('content.php');
require_once('footer.php');