<?php

include('koneksi.php');

//get id
$id = $_GET['id'];

$query1 = mysqli_fetch_array($koneksi->query("SELECT * FROM tb_surat WHERE id_surat = '$id'"));


// The location of the PDF file
// on the server
$extension = pathinfo($query1['nm_file'], PATHINFO_EXTENSION);

$path = "file/dokumen/";


$filename = $path . $query1['nm_file'];

// Header content type
header("Content-type: application/pdf");

header("Content-Length: " . filesize($filename));

// Send the file to the browser.
readfile($filename);
