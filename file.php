<?php
// The location of the PDF file
// on the server
$extension = pathinfo($d['nm_file'], PATHINFO_EXTENSION);
if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png') {
    $path = "file/gambar/";
    $nama = $path . $d['nm_file'];
    echo "<a href='$nama' download><i type='button' class='fas fa-file-download'></i><a>";
    // var_dump($d['nm_file']);
    // die();
} elseif ($extension == 'docx' || $extension == 'doc') {
    $path = "file/dokumen/";
    $nama = $path . $d['nm_file'];
    echo "<a href='$nama' download><i type='button' class='fas fa-file-download'></i><a>";
    // var_dump($d['nm_file']);
    // die();
} else {
    $path = "file/dokumen/";
    $nama = $path . $d['nm_file'];
    // Header content type
    echo "<a href='pdf.php?id=$d[id_surat]; ?>' target='_blank'><i type='button' class='fas fa-file-download'></i></a>";
}
