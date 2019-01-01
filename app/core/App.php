<?php

class App {
    //membuat property untuk menentukan controller , method & parameter default nya
    //protected si controller yaitu home
    protected $controller = 'Home';

    //protected si method yaitu index
    protected $method = 'index';

    //protected si parameter yaitu berupa array kosong
    protected $parameters = [];

    public function __construct(){

        //Url diisi dengan -> panggil method yg sudah dibuat dibawah
        $url = $this->parseURL();

        //var_dump dibawah hanya pengembalian atau penyimpanan url nya dalam sesuatu, misal di pascal ditaro di temp gitu, makanya saya comment
    /*  var_dump($url);   */


        //CONTROLLER
        /*Pengecekan kondisi dimana saat url diakses (yang berada di index sebagai method) nama file php itu ada nggak didalem folder yg dicek nya, pd contoh dibawah dicek di folder controller 
          tapi kalau nggak ada, dia tetep memanggil controller default nya yaitu home */

        if(file_exists('../app/controllers/' . $url[0] . '.php' )){

            //kalau pas dicek itu ada, maka controller yg sudah ada diatas ditimpa untuk menjadi controller baru
            $this->controller = $url[0];

            //untuk menghilangkan controller yg tadi dari elemen array nya , supaya kita bisa ambil parameter yg diatas tadi
            unset($url[0]);
        }
        //kalau sudah kita panggil controller nya menggunakan require once
        require_once '../app/controllers/' . $this->controller . '.php';

        //kalau sudah kita lakukan instansiasi spt biasa make this ->
        $this->controller = new $this->controller;


        //METHOD
        /* Pengecekan kondisi dimana method nya ada atau isset */
        if( isset($url[1]) ){

            //kondisi kalau method nya ada pada sebuah objek yg sudah diinstansiasi (this->controller) kemudian ada nggak si method nya (url nya) 
            if( method_exists($this->controller, $url[1])){

                //kalau ada maka diisi saja si method nya dengan url nya
                $this->method = $url[1];

                //baru kemudian diunset untuk menghilangkan dari elemen array
                unset($url[1]);
            }
        }

        //PARAMETERS
        /* parameter merupakan data yg dikirim pada url tersebut , maka cek terlebih dahulu parameter nya ada atau tidak*/
        if(!empty($url)){

            //menginstansiasi parameter yang sudah di deklarasi diatas ke dalam array_values (nilai array nya)
            $this->parameters = array_values($url);
        }

        //Jalankan controller & method , serta kirimkan parameters jika ada
       /* Untuk menjalankan controller & method serta mengirimkan parameter */ 
        call_user_func_array( [ $this->controller , $this->method ] ,  $this->parameters);
    }

    public function parseURL(){
        //ini kondisi dimana ada url yang dikirimkan, maka kita akan ambil isi url tersebut  
        if(isset($_GET['url'])){
            //Kita ambil url nya, lalu kita isi dengan url itu sendiri kemudian (lanjut di comment yg bawah)
            //Untuk membersihkan / atau slash yang berada pada paling akhir ujung url nya, menggunakan rtrim
            $url = rtrim($_GET['url'], '/');

            //Untuk membersihkan akan terjadi nya karakter2 ngaco pada url kita atau menghindari di hack, menggunakan filter sanitize
            $url = filter_var($url, FILTER_SANITIZE_URL);

            //Untuk memecah url yang sudah terbagi di sub slash2 tersebut, menggunakan fungsi explode
            $url = explode('/', $url);
            return $url;
        }
    }
}


