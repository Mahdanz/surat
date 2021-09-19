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


$ekstensi =  array('pdf', 'doc', 'docx');

$x = explode('.', $filename);
// $ekstensiboleh = strtolower(end($x)); 
$ext = pathinfo($filename, PATHINFO_EXTENSION);

// uji jika ekstensi file sesuai

//simpan data ke database
move_uploaded_file($_FILES['nm_file']['tmp_name'], 'file/' . $filename);
$result = mysqli_query($koneksi, "UPDATE tb_surat SET no_surat='$no_surat' ,tgl='$tgl' ,pengirim='$pengirim',penerima='$penerima' ,tembusan='$tembusan' ,perihal='$perihal' ,nm_file='$filename' , sifat='$sifat', keaslian='$keaslian' , arsip='$arsip' , tipe='$tipe' WHERE id_surat='$id' ");
// header("location:index.php?alert=berhasil");        
if (!$result) {
    die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
        " - " . mysqli_error($koneksi));
} else {
    echo "<script>alert('Data berhasil dirubah.');window.location='index.php';</script>";
}
