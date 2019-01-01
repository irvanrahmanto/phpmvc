<?php

class Home extends Controller{ //nanti nya class home ini akan extends ke class controller yang ada di folder core
    public function index(){// kita buat method default nya, agar ketika kita tidak menuliskan apapun diurl nya, maka method ini lah yg kita panggil

        //ini untuk memanggil method (yang nanti nya akan kita simpan di kelas controller yg ada di core) view

        //menginstansiasi tiap2 ganti page pada judul halaman nya
        $data['judul'] = 'Home';

        /* ini adalah sebuah pengisian data dimana data akan dikirimkan dari model (yang diinputkan oleh user misalnya) menuju  
        tampilan pada view yang sudah kita atur di controller nya.
        Pada contoh dibawah kita mengisi nama, dia memanggil model yang bernama User_model -> kemudian memanggil method didalamnya yang bernama getuser
        jadi nanti nya siapapun user yang masuk akan dikirimkan ke ['nama'] dan si ['nama'] tadi dikirimkan ke $this->view('home/index', $data); gitu */
        $data['nama'] = $this->model('User_model')->getUser();

        //memanggil header pada folder templates yg ada di folder views
        $this->view('templates/header' , $data);

        //isi dari view nya adalah alamat menuju ke view yg kita mau akses
        $this->view('home/index' , $data);
        
        //memanggil footer pada folder templates yg ada di folder views
        $this->view('templates/footer');
    }
}