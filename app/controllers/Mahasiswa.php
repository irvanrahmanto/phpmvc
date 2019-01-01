<?php

class Mahasiswa extends Controller{ //class mahasiswa karena ada menu baru dari navbar nya ialah mahasiswa
    public function index(){// ini merupakan method default nya, public index, jgn pernah lupa membuat method default nya

        //deklarasi dari data yang berada pada class mahasiswa
        $data['judul'] = 'Daftar Mahasiswa';

        //Pendeklarasian dimana memanggil mahasiswa_model pada folder model untuk dipanggil method nya juga ialah data dari getAllmhs()
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMhs();

        //pendeklarasian header pada view nya nanti
        $this->view('templates/header', $data);

        //deklarasi untuk view dari index nya nanti
        $this->view('mahasiswa/index', $data);

        //pendeklarasian footer pada view nya nanti
        $this->view('templates/footer');
    }

    public function detail($id){// ini merupakan method default nya, public index, jgn pernah lupa membuat method default nya

        //deklarasi dari data yang berada pada class mahasiswa
        $data['judul'] = 'Detail Mahasiswa';

        //Pendeklarasian dimana memanggil mahasiswa_model pada folder model untuk dipanggil method nya juga ialah data dari getAllmhs()
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);

        //pendeklarasian header pada view nya nanti
        $this->view('templates/header', $data);

        //deklarasi untuk view dari index nya nanti
        $this->view('mahasiswa/detail', $data);

        //pendeklarasian footer pada view nya nanti
        $this->view('templates/footer');
    }

    public function tambah(){//
        //jadi ketika form diklik tombol sumbit maka data akan dikirimkan kesini
        //var_dump($_POST);
        //Kita akan jalankan sebuah method didalam model kita yang namanya tambah data mahasiswa

        if($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0){// maksudnya adalah kita memanggil model yaitu mahasiswa_model dan memanggil lagi isi nya si tambahDataMahasiswa berisi $_POST kalau lebih > dari 0 maka pindahkan data nya ke halaman utama mahasiswa
            Flasher::setFlash('Berhasil', 'ditambahkan', 'success'); //pengiriman data jika penginputan berhasil
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else{
            Flasher::setFlash('Gagal', 'ditambahkan', 'danger'); //pengiriman data jika penginputan gagal
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }

    }

    
    public function hapus($id){//
        /*jadi ketika form diklik tombol hapus maka data akan dihapus
        //var_dump($_POST);
        Kita akan jalankan sebuah method didalam model kita yang namanya tambah data mahasiswa */

        if($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0){// maksudnya adalah kita memanggil model yaitu mahasiswa_model dan memanggil lagi isi nya si tambahDataMahasiswa berisi $_POST kalau lebih > dari 0 maka pindahkan data nya ke halaman utama mahasiswa
            Flasher::setFlash('Berhasil', 'dihapuskan', 'success'); //pengiriman data jika penginputan berhasil
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else{
            Flasher::setFlash('Gagal', 'dihapuskan', 'danger'); //pengiriman data jika penginputan gagal
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function getubah(){
        //echo $_POST['id'];
        echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
    }


    public function edit(){
        /*jadi ketika form diklik tombol edit maka data akan diberubah
        //var_dump($_POST);
        Kita akan jalankan sebuah method didalam model kita yang namanya tambah data mahasiswa */

        if($this->model('Mahasiswa_model')->editDataMahasiswa($_POST) > 0){// maksudnya adalah kita memanggil model yaitu mahasiswa_model dan memanggil lagi isi nya si tambahDataMahasiswa berisi $_POST kalau lebih > dari 0 maka pindahkan data nya ke halaman utama mahasiswa
            Flasher::setFlash('Berhasil', 'diubah', 'success'); //pengiriman data jika penginputan berhasil
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else{
            Flasher::setFlash('Gagal', 'diubah', 'danger'); //pengiriman data jika penginputan gagal
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function cari(){
        //deklarasi dari data yang berada pada class mahasiswa
        $data['judul'] = 'Daftar Mahasiswa';

        //Pendeklarasian dimana memanggil mahasiswa_model pada folder model untuk dipanggil method nya juga ialah data dari getAllmhs()
        $data['mhs'] = $this->model('Mahasiswa_model')->cariDataMhs();

        //pendeklarasian header pada view nya nanti
        $this->view('templates/header', $data);

        //deklarasi untuk view dari index nya nanti
        $this->view('mahasiswa/index', $data);

        //pendeklarasian footer pada view nya nanti
        $this->view('templates/footer');
    }

}