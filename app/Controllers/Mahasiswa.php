<?php

namespace Controllers;

use Models\Model_mhs;

class Mahasiswa
{
    public function __construct()
    {
        $this->mhs = new Model_mhs();
    }

    public function index()
    {
        require_once 'app/Views/index.php';
    }

    function show_data()
    {
        if (!isset($_GET['i'])) {
            //jika tidak ada parameter id yang dikirim, maka akan menampilkan semua data yang ada
            $rs = $this->mhs->lihatData();
            require_once('app/Views/mhsList.php');
        } else {
            //ada parameter id yang dikirim, tampilkan detail dari salah satu data yang dipilih
            $rs = $this->mhs->lihatDataDetail($_GET['i']);
            require_once('app/Views/mhsDetail.php');
        }
    }

    function save()
    {
        $nama = $_POST['nama'];
        $npm =  $_POST['npm'];

        // Simpan data ke model
        $this->mhs->simpanData($nama, $npm);
        header("Location: /mvc_native/?act=tampil-data");
    }

    function login()
    {
        $npm = $_POST['npm'];
        $nama = $_POST['nama'];

        // Cek data ke model
        $rs = $this->mhs->cek_login($nama, $npm);

        if ($rs) {
            echo "<script>alert('Login Berhasil');</script>";
            header("Location: /mvc_native/?act=tampil-data");
        } else {
            $this->index();
            echo "<script>alert('Login gagal. Cek NPM dan nama Anda.');</script>";
        }
    }
    function hapus_data()
    {
        $id = $_GET['i'];
        $rs = $this->mhs->hapus_data($id);
        if ($rs) {
            echo "<script>alert('Hapus Data Berhasil');</script>";
            header("Location: /mvc_native/?act=tampil-data");
        } else {
            echo "<script>alert('Hapus Data Gagal');</script>";
            header("Location: /mvc_native/?act=tampil-data");
        }
    }
}
