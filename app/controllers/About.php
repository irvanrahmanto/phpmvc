<?php

class About extends Controller{ //nanti nya class home ini akan extends ke class controller yang ada di folder core
    public function index($nama = 'Irvan' , $pekerjaan = 'Mahasiswa' , $umur = '20'){
        //echo "Hallo , nama saya $nama, saya adalah seorang $pekerjaan";


        //menyiapkan 3 data berbeda nama,pekerjaan,umur untuk nantinya dikirimkan ke syntax view index
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['umur'] = $umur;

        //menginstansiasi tiap2 ganti page pada judul halaman nya
        $data['judul'] = 'About';

        //memanggil header pada folder templates yg ada di folder views
        $this->view('templates/header' , $data);

        //kita akan memanggil view yang ada difolder about yg nama file nya index
        $this->view('about/index' , $data);

        //memanggil footer pada folder templates yg ada di folder views
        $this->view('templates/footer');
    }

    public function page(){// kita buat method default nya, agar ketika kita tidak menuliskan apapun diurl nya, maka method ini lah yg kita panggil
        //echo 'About/page';


        //menginstansiasi tiap2 ganti page pada judul halaman nya
        $data['judul'] = 'page';

        //memanggil header pada folder templates yg ada di folder views
        $this->view('templates/header' , $data);

        //kita akan memanggil view yang ada difolder about yg nama file nya page
        $this->view('about/page');

        //memanggil footer pada folder templates yg ada di folder views
        $this->view('templates/footer');
    }
}