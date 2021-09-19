<?php

include('koneksi.php');

//get id
$id = $_GET['id'];


$query1 = mysqli_fetch_array($koneksi->query("SELECT * FROM tb_surat WHERE id_surat = '$id'"));
if ($query1 !== null) {
    if (is_file("file/" . $query1['nm_file'])) {
        unlink("file/" . $query1['nm_file']);
    }
}

$query = "DELETE FROM tb_surat WHERE id_surat = '$id'";

if ($koneksi->query($query)) {
    header("location: index.php");
} else {
    echo "DATA GAGAL DIHAPUS!";
}
