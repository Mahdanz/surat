<?php
include 'koneksi.php';

$no_surat = $_POST['no_surat'];
$tgl = $_POST['tgl'];
$pengirim = $_POST['pengirim'];
$penerima = $_POST['penerima'];
$tembusan = $_POST['tembusan'];
$perihal = $_POST['perihal'];
$filename = $_FILES['nm_file']['name'];
$sifat = $_POST['sifat'];
$keaslian = $_POST['keaslian'];
$arsip = $_POST['arsip'];
$tipe = $_POST['tipe'];


$ekstensi =  array('pdf', 'doc', 'docx');

$x = explode('.', $filename);
// $ekstensiboleh = strtolower(end($x)); 
$ext = pathinfo($filename, PATHINFO_EXTENSION);

// uji jika ekstensi file sesuai

if (in_array($ext, $ekstensi) === true) {



    //simpan data ke database
    move_uploaded_file($_FILES['nm_file']['tmp_name'], 'file/' . $filename);
    $result = mysqli_query($koneksi, "INSERT INTO tb_surat (no_surat,tgl,pengirim,penerima,tembusan,perihal,nm_file, sifat, keaslian, arsip, tipe) VALUES('$no_surat','$tgl','$pengirim','$penerima','$tembusan','$perihal', '$filename', '$sifat', '$keaslian', '$arsip', '$tipe')");
    // header("location:index.php?alert=berhasil");
    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
            " - " . mysqli_error($koneksi));
    } else {
        echo "<script>alert('Data berhasil ditambah.');window.location='keluar.php';</script>";
    }
} else {
    //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
    echo "<script>alert('Ekstensi diperbolehkan hanya pdf, doc dan docx.');window.location='keluar.php';</script>";
}
