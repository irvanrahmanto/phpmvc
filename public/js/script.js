$(function(){

    $('.tombolTambahData').on('click', function(){ // perintah ini maksudnya adalah, $ maksudnya jquery, meminta perintah pada jquery tolong carikan saya kelas yg namanya .tampilModalUbah yang ketika di klik jalankan function ini
        //console.log('ok'); // ini untuk mengetes pada inspect apakah javascript nya error apa tidak
        $('#judulModalLabel').html('Tambah Data Mahasiswa'); //jquery saat sudah ketemu, isi nya ganti jadi Ubah Data Mahasiswa
        $('.modal-footer button[type=submit]').html('Tambah Data Mahasiswa'); //jquery tolong cariin saya elemen yg namanya modal footer,saat sudah ketemu, isi nya ganti jadi Tambah Data Mahasiswa
    });

    $('.tampilModalUbah').on('click', function(){ // perintah ini maksudnya adalah, $ maksudnya jquery, meminta perintah pada jquery tolong carikan saya kelas yg namanya .tampilModalUbah yang ketika di klik jalankan function ini
        //console.log('ok'); // ini untuk mengetes pada inspect apakah javascript nya error apa tidak
        $('#judulModalLabel').html('Ubah Data Mahasiswa'); //jquery tolong cariin saya elemen ,saat sudah ketemu, isi nya ganti jadi Ubah Data Mahasiswa
        $('.modal-footer button[type=submit]').html('Ubah Data Mahasiswa'); //jquery tolong cariin saya elemen yg namanya modal footer,saat sudah ketemu, isi nya ganti jadi Ubah Data Mahasiswa

        const id = $(this).data('id');//this ini maksudnya adalah tombol klik lalu kita akan ambil datanya
        
        $.ajax({
            url: 'http://localhost/phpmvc/public/mahasiswa/getubah',
            data: {id : id},
            method: 'post',
           // dataType: 'json',
            success: function(data){
                console.log(data);
            }
        });

    });

    

});