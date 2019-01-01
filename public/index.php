<?php
if( !session_id() ) {
    session_start(); //untuk menjalankan session, kita cek jika didalam aplikasi kita tidak ada / terdeteksi session id nya maka jalankan session nya
}

require_once '../app/init.php';

$app = new App;
