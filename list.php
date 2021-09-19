<tr>
    <td scope="row"><?php echo $no++; ?></td>
    <td><?php echo $d['no_surat']; ?></td>
    <td><?php echo $d['tgl']; ?></td>
    <td><?php echo $d['arsip']; ?></td>
    <td><?php echo $d['penerima']; ?></td>
    <td><?php echo $d['tembusan']; ?></td>
    <td><?php echo $d['perihal']; ?></td>
    <td><?php echo $d['sifat'];
        echo " . ";
        echo $d['keaslian']; ?></td>

    <td class=" center">
        <a href="pdf.php?id=<?php echo $d['id_surat']; ?>" target="_blank"><i type="button" class="fas fa-file-download"></i></a>
    </td>

    <td style="color: #212529; text-decoration: none;">

        <i type="button" class="far fa-edit" data-bs-toggle="modal" data-bs-target="#modaleditkeluar<?php echo $d['id_surat']; ?>" id="editmasuk"></i>
        <style>
            .modal-backdrop {
                z-index: -1;
            }
        </style>

        <a href="hapuskeluar.php?id=<?php echo $d['id_surat']; ?>">
            <i type="button" class="far fa-trash-alt"></i>
        </a>
    </td>
</tr>