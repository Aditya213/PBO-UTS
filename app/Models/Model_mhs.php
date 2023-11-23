<?php

/**
 * Model mahasiswa berfungsi untuk menjalankan query
 * Sebelum menggunakan query, load dulu library database
 */

namespace Models;

use Libraries\Database;

class Model_mhs
{
    public function __construct()
    {
        $db = new Database();
        $this->dbh = $db->getInstance();
    }

    function simpanData($nama, $npm)
    {
        $rs = $this->dbh->prepare("INSERT INTO mahasiswa (nama,npm) VALUES (?,?)");
        $rs->execute([$nama, $npm]);
    }

    function lihatData()
    {

        $rs = $this->dbh->query("SELECT * FROM mahasiswa");
        return $rs;
    }

    function lihatDataDetail($id)
    {

        $rs = $this->dbh->prepare("SELECT * FROM mahasiswa WHERE id=?");
        $rs->execute([$id]);
        return $rs->fetch(); // kalau hasil query hanya satu, gunakan method fetch() bawaan PDO
    }

    function cek_login($nama, $npm)
    {
        $rs = $this->dbh->prepare("SELECT * FROM mahasiswa WHERE nama = ? AND npm = ?");
        $rs->execute([$nama, $npm]);

        // Mengembalikan true jika ada hasil (login berhasil), dan false jika tidak ada hasil.
        return $rs->fetch();
    }
    function hapus_data($id)
    {
        $rs = $this->dbh->prepare("DELETE FROM mahasiswa WHERE id=?");
        $rs->execute([$id]);
    }
}
