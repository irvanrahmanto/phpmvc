<?php // flasher ini berfungsi sebagai flash message ketika kita sudah melakukan aksi

class Flasher{
    // sebuah method static, kita dapat memanggil method nya tanpa harus melakukan instansiasi

    public static function setFlash($pesan, $aksi, $tipe){// parameter yang tersedia ada pesan, aksi dan tipe bootstrap nya (berhasil (warna hijau)/tidak (warna kuning)), maksudnya pesan nya berhasil/tidak dst
        // set session nya berisi data2 dari parameter tadinya ke dalam array

        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }

    // method untuk menampilkan si pesan nya mau apa yg ditampilin
    public static function flash(){
        if( isset($_SESSION['flash']) ){ // pertama kita cek, ada nggak si session flash nya 
            echo '<div class="alert alert-'. $_SESSION['flash']['tipe'] .' alert-dismissible fade show" role="alert"> Data Mahasiswa 
                        <strong>'. $_SESSION['flash']['pesan'] .'</strong> ' . $_SESSION['flash']['aksi'] .'
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                  </div>'; // ini tag alert dari bootstrap
            unset($_SESSION['flash']); //kita hapus session nya, jadi hanya berlaku sekali , maksudnya adalah jika nanti halaman nya di refresh session ya udh gaad lagi
            
        }
    }
}

