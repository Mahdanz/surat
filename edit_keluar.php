<?php
include 'koneksi.php';

$id = $_GET['id_surat'];
$no_surat = $_GET['no_surat'];
$tgl = $_GET['tgl'];
$pengirim = $_GET['pengirim'];
$penerima = $_GET['penerima'];
$tembusan = $_GET['tembusan'];
$perihal = $_GET['perihal'];
$filename = $_FILES['nm_file']['name'];
$sifat = $_GET['sifat'];
$keaslian = $_GET['keaslian'];
$arsip = $_GET['arsip'];
$tipe = $_GET['tipe'];


$result = mysqli_query($koneksi, "UPDATE tb_surat SET no_surat='$no_surat' ,tgl='$tgl' ,pengirim='$pengirim',penerima='$penerima' ,tembusan='$tembusan' ,perihal='$perihal' ,nm_file='$filename' , sifat='$sifat', keaslian='$keaslian' , arsip='$arsip' , tipe='$tipe' WHERE id_surat='$id' ");
// header("location:keluar.php?alert=berhasil");        
if (!$result) {
    die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
        " - " . mysqli_error($koneksi));
} else {
    echo "<script>alert('Data berhasil dirubah.');window.location='keluar.php';</script>";
}
