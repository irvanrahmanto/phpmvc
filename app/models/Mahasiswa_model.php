<?php //user model ini berasal dari penginputan data yang nantinya akan dikirimkan dari controller mahasiswa

class Mahasiswa_model  { //pembuatan class mahasiswa pada model mahasiswa yang disiapkan
    private $table = 'mahasiswa';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    /*
    pendeklarasian agar model ini konek pada database yg sudah kita buat dan bisa ambil data didalamnya
    //kita menggunakan PDO (php data object), caranya buat variable dulu untuk menampung koneksi PDO nya
    private $dbh;  //database handler buat menampung koneksi ke database
    private $stmt; //statment nya untuk menyimpan query 
    */


    //kita buat sebuah method bersifat public dimana untuk mengambil data diatas tadi
    public function getAllMhs(){

        //kita ambil semua data mhs tersebut
       /* return $this->mhs; //MAAF DIKOMEN KARENA INI TADI CONTOH KALO DATA NYA GAK DARI DATABASE 

       //SEKARANG KALO DATA NYA DARI DATABASE
       //untuk mendapatkan semua data mahasiswa nya, maka kita perlu lakukan query nya
        $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa'); //kalau pakai PDO kita harus lakukan perintah/syntax prepare baru masukkan query nya            

        //barulah dilakukan eksekusi, ini cara kalau menggunakan PDO agar aman
        $this->stmt->execute();

        //setelah sudah kita jalankan query nya
        //barulah ambil data nya dengan return, kemudian fetchAll lalu kita kasih parameter mau sebagai apa data nya, klo PDO menjadi array asosiatif
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC); */

        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->singleSet();
    }


    /* 
    Pada bagian ini data yg dikirim tadi akan dilakukan query terlebih dahulu kedalam database, karena ingin menambah data maka query insert, kemudian selanjutnya dilakukan query nya ke dalam array2 masing2 data yg di query untuk terakhir di eksekusi pada syntax terakhir dann di return in baris yang berubah dalam tabel nya yaitu si rowCount yg berada pada core/Database
    */
    public function tambahDataMahasiswa($data){
        $query = "INSERT INTO mahasiswa 
                    VALUES 
                    ('', :Nama, :NIM, :Email, :Program_studi)"; 

        $this->db->query($query);
        $this->db->bind('Nama', $data['Nama']);
        $this->db->bind('NIM', $data['NIM']);
        $this->db->bind('Email', $data['Email']);
        $this->db->bind('Program_studi', $data['Program_studi']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataMahasiswa($id){
        $query = "DELETE FROM mahasiswa WHERE id = :id"; //kita lakukan binding pada id nya
        $this->db->query($query);
        $this->db->bind('id', $id); //id nya di binding menggunakan dollar id

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariDataMhs(){

        $keyword = $_POST['keyword']; // pencarian berdasarkan keyword nya, yg sudah diset samakan pada view tadi

        $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword"; //query dilakukan menggunakan like karena beranggapan ingin memunculkan semua kemungkinan nama termirip nanti saaat dipencarian

        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();

    }
}