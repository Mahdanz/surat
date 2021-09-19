                    <!-- MODAL EDIT -->
                    <div class="modal fade" id="modaleditmasuk<?php echo $d['id_surat'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Surat</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <form role="form" action="edit_masuk.php" method="get">
                                        <?php
                                        $id = $d['id_surat'];
                                        $query_edit = mysqli_query($koneksi, "SELECT * FROM tb_surat WHERE id_surat='$id'");
                                        while ($row = mysqli_fetch_array($query_edit)) {

                                        ?>
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label"><i class="fas fa-list-ol"></i> Nomor Surat:</label>
                                                <input type="text" class="form-control" id="recipient-name" name="no_surat" value="<?php echo $row['no_surat'] ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="message-text" class="col-form-label"><i class="far fa-calendar-alt"></i> Tanggal Surat:</label>
                                                <input class="form-control" type="date" id="message-text" name="tgl" value="<?php echo $row['tgl'] ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="message-text" class="col-form-label"><i class="far fa-window-restore"></i> Kode Arsip:</label>
                                                <input class="form-control" id="message-text" name="arsip" value="<?php echo $row['arsip'] ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="message-text" class="col-form-label"><i class="far fa-paper-plane"></i> Pengirim:</label>
                                                <input class="form-control" id="message-text" name="pengirim" value="<?php echo $row['pengirim'] ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="message-text" class="col-form-label"><i class="far fa-clipboard"></i> Perihal:</label>
                                                <input class="form-control" id="message-text" name="perihal" value="<?php echo $row['perihal'] ?>">
                                            </div>
                                            <div class="mb-3">
                                                <div class="column">
                                                    <label for="message-text" class="col-form-label"><i class="fas fa-unlock-alt"></i> Sifat:</label>
                                                    <div class="container">
                                                        - Kerahasiaan
                                                        <div class="col-lg-7">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="sifat" value="U" <?php if ($row['sifat'] == 'U') echo 'checked' ?>>
                                                                <label class="form-check-label" for="flexRadioDefault1">
                                                                    Umum

                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="sifat" value="R" <?php if ($row['sifat'] == 'R') echo 'checked' ?>>
                                                                <label class="form-check-label" for="flexRadioDefault2">
                                                                    Rahasia
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <br> - Keaslian
                                                        <div class="col-lg-7">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="keaslian" value="A" <?php if ($row['keaslian'] == 'A') echo 'checked' ?>>
                                                                <label class="form-check-label" for="flexRadioDefault1">
                                                                    Asli
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="keaslian" value="C" <?php if ($row['keaslian'] == 'C') echo 'checked' ?>>
                                                                <label class="form-check-label" for="flexRadioDefault2">
                                                                    Copy
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label"><i class="fas fa-file-pdf"></i> File PDF: <label style="color: red;">Tidak dapat dirubah</label></label>
                                                <input class="form-control" disable id="formFile" name="nm_file" value="<?php echo $row['nm_file'] ?>" disabled>
                                            </div>
                                            <input type="hidden" name="id_surat" value="<?php echo $row['id_surat'] ?>">
                                            <input type="hidden" name="penerima" value="">
                                            <input type="hidden" name="tembusan" value="">
                                            <input type="hidden" name="tipe" value="masuk">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        <?php } ?>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- MODAL EDIT -->