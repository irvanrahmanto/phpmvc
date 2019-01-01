<?php

class Database {
    // kita akan tulis data dari database kita
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh;
    private $stmt;

    //melakukan koneksi ke database didalam method construct supaya pas model ini dipanggil yg pertama dilakukan adalah koneksi dulu ke database
    public function __construct(){ //INI HANYA SEBAGAI CONTOH SAJA, JGN LAKUKAN INI KALO MAU BUAT APLIKASINYA, KARENA JGN MEYIMPAN USER&PASSWORD KITA PADA FILE INI KARENA RAWAN UNTUK DIRETAS, HARUS DISIMPAN DITEMPAT YG AMAN

        //data source name
        $dsn = 'mysql:host='. $this->host .';dbname='. $this->db_name; //deklarasi variabel untuk identitas server kita

        //kita butuh parameter opstion untuk nantinya kita gunakan mengoptimasi ke database kita
        $option = [
            //PARAMETER dari konfigurasi database nya
            PDO::ATTR_PERSISTENT => true,  //untuk membuat database kita koneksi nya terjaga terus
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION //untuk mode error nya, maka tampilkan exception
        ];

        //melakukan pengecekan database nya menggunakan try block catch
        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option); //root yg pertama merupakan username, yg kedua password nya
        } catch(PDOException $e){ //kondisi dimana kalau error dalam variable e
            die($e->getMessage()); //maka berikan pesan error nya dari e ke getMessage()
        }
    }

    //function untuk menjalankan query, kita membuat generic agar bisa digunakan siapapun
    public function query($query){
        $this->stmt = $this->dbh->prepare($query);
    }

    //function untuk binding data nya
    public function bind($param, $value , $type = null){
        if( is_null($type) ){ // ketika nilai nya null
            switch( true ){   // maka lakukan switch menjadi true
                case is_int($value) : //ketika nilai nya integer
                    $type = PDO::PARAM_INT; // maka param nya int
                    break;
                case is_bool($value) : //ketika nilai nya boolean
                    $type = PDO::PARAM_BOOL; //maka param nya boolean
                    break;
                case is_null($value) : //ketika nilai nya null
                    $type = PDO::PARAM_NULL; // maka param nya null
                    break;
                default :
                    $type = PDO::PARAM_STR;
            }
        }
        
        $this->stmt->bindValue($param, $value, $type);

    }    

    // function ini untuk eksekusi data nya setelah di binding
    public function execute(){
        $this->stmt->execute();
    }

    // function ini jikalau hasil dari eksekusi nya banyak, tapi mungkin saja 1.. parameter ini kalau lebih dari satu/banyak
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC); //maka keluaran data nya menjadi asosiatif
    }

    // function ini jikalau hasil dari eksekusi nya 1 saja
    public function singleSet(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC); //tidak memakai all pada fetch nya
    }

    // ini fungsi nya untuk menghitung berapa banyak baris yang berubah dalam tabelnya nanti, 
    public function rowCount(){
        return $this->stmt->rowCount();
    }

}