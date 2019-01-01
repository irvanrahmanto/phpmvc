<?php //user model ini berasal dari penginputan data yang nantinya akan dikirimkan dari controller home

class User_model{

    //pembuatan variabel yang berisikan data nama, ini hanya sebagai contoh agar simpel. padahal kompleks
    private $nama = 'Irvan';

    //Karena data nya sudah ada (yang diatas tadi, private $nama = 'irvan';) tinggal kita ambil pada method ini
    //yang mau kita panggil dicontroller nya
    public function getUser(){
        return $this->nama;
    }
}