<div class="container mt-3">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?> <!-- ini kita keluarin disini flash meesage nya, panggil method Flasher nya, karena dia statis jadi tinggal pakai :: -->
        </div>
    </div>


    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
                Tambah Data Mahasiswa
            </button>
        </div>   
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
           <form action="<?= BASEURL; ?>/mahasiswa/cari" method="post" >
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search your name" name="keyword" id="keyword" autocomplete="off" >
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" id="tombolCari">Search</button>
                        </div>
                </div>
           </form>
        </div>   
    </div>


    <div class="row">
        <div class="col-lg-6">

            <h3> Daftar Mahasiswa </h3>

            <ul class="list-group">

                <!-- foreach untuk mengambil data tsb -->
                <?php foreach( $data['mhs'] as $mhs ) : ?>
                    <li class="list-group-item"> 
                        <?= $mhs['Nama']; ?> 

                        <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id']; ?>" class="badge badge-danger float-right ml-2" onclick="return confirm('Yakin ?');" >hapus</a>

                        <a href="<?= BASEURL; ?>/mahasiswa/ubah/<?= $mhs['id']; ?>" class="badge badge-success float-right ml-2 tampilModalUbah" data-toggle="modal" data-target="#formModal"  data-id="<?= $mhs['id']; ?>" >Edit</a>

                        <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>" class="badge badge-primary float-right ml-2" >detail</a>


                    </li>
                <?php endforeach; ?>

            </ul>
        </div>
    </div>

</div>

<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModalLabel">Tambah Data Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
         
        <div class="form-group">
            <label for="Nama">Nama Mahasiswa</label>
            <input type="text" class="form-control" id="Nama" name="Nama">
         </div>

         <div class="form-group">
            <label for="NIM">NIM</label>
            <input type="number" class="form-control" id="NIM" name="NIM" >
        </div>

        <div class="form-group">
            <label for="Email">Email address</label>
            <input type="Email" class="form-control" id="Email" name="Email" placeholder="name@example.com">
        </div>

        <div class="form-group">
            <label for="Program_studi">Jurusan</label>
            <select class="form-control" id="Program_studi" name="Program_studi">
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Manajemen Bisnis">Manajemen Bisnis</option>
                <option value="Teknik Mesin">Teknik Mesin</option>
                <option value="Ilmu Komunikasi">Ilmu Komunikasi</option>
            </select>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>

