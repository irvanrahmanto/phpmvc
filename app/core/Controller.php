<?php

class Controller {

    //menentukan view yang akan diakses oleh controller yg ada dihome yg nanti ditangkap oleh method dibawah ini
    public function view($view, $data = [] ){
    
        //lakukan panggilan untuk memanggil view nya pake require yg kaya di app tadi, menuju folder2
        require_once'../app/views/' . $view . '.php';
        }

    /* kita buat si model ini agar tersambung dengan yang sudah kita panggil di home pada folder controller */
    public function model($model){

        //dilakukan panggilan , kita keluar dari folder core ini menuju app kemudian masuk ke models , bertujuan agar memanggil data yg ada pada User_model 
        require_once'../app/models/' . $model . '.php';

        //tidak selesai sampai disini, karena model ini merupakan class maka kita harus lakukan instansiasi 
        return new $model;
    }
}