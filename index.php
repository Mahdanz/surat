<?php include 'header.php';
include 'koneksi.php'; ?>

<body>

    <!-- ======= Mobile nav toggle button ======= -->
    <!-- <button type="button" class="mobile-nav-toggle d-xl-none"><i class="bi bi-list mobile-nav-toggle"></i></button> -->

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex flex-column justify-content-center">

        <nav id="navbar" class="navbar nav-menu">
            <ul>
                <li><a href="index.php" class="nav-link scrollto"><i class='bx bx-archive-in'></i><span>Surat Masuk</span></a></li>
                <li><a href="keluar.php" class="nav-link scrollto"><i class='bx bx-archive-out'></i> <span>Surat Keluar</span></a></li>
            </ul>
        </nav>
        <!-- .nav-menu -->

    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Surat Masuk</h2>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <form action="index.php" method="get">
                            <div class="input-group">
                                <input type="search" name="cari" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                <button type="submit" value="cari" class="btn btn-outline-primary">cari</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-1 pt-1 pt-lg-0 content">
                        <div class="dropdown">
                            <button class="btn btn-secondary" type="button" data-bs-toggle="modal" data-bs-target="#modaltambahmasuk" id="tambahmasuk">
                                Tambah
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-6 pt-6 pt-lg-0 content"></div>


                </div>

                <br>

                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nomor Surat</th>
                            <th scope="col">Tgl Surat</th>
                            <th scope="col">Kode Arsip</th>
                            <th scope="col">Pengirim</th>
                            <th scope="col">Perihal</th>
                            <th scope="col">Sifat</th>
                            <th scope="col">File</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        if (isset($_GET['cari'])) {
                            $cari = $_GET['cari'];
                            $data = mysqli_query($koneksi, "select * from tb_surat where tipe ='keluar' AND no_surat like '%" . $cari . "%' OR tgl like '%" . $cari . "%' OR arsip like '%" . $cari . "%' OR pengirim like '%" . $cari . "%' OR perihal like '%" . $cari . "%' OR nm_file like '%" . $cari . "%' ORDER BY id_surat ASC ");
                            while ($d = mysqli_fetch_array($data)) {
                        ?>

                                <tr>
                                    <td scope="row"><?php echo $no++; ?></td>
                                    <td><?php echo $d['no_surat']; ?></td>
                                    <td><?php echo $d['tgl']; ?></td>
                                    <td><?php echo $d['arsip']; ?></td>
                                    <td><?php echo $d['pengirim']; ?></td>
                                    <td><?php echo $d['perihal']; ?></td>
                                    <td><?php echo $d['sifat'];
                                        echo " . ";
                                        echo $d['keaslian']; ?></td>

                                    <td class=" center">
                                        <a href="pdf.php?id=<?php echo $d['id_surat']; ?>" target="_blank"><i type="button" class="fas fa-file-download"></i></a>
                                    </td>

                                    <td style="color: #212529; text-decoration: none;">

                                        <i type="button" class="far fa-edit" data-bs-toggle="modal" data-bs-target="#modaleditmasuk<?php echo $d['id_surat']; ?>" id="editmasuk"></i>
                                        <style>
                                            .modal-backdrop {
                                                z-index: -1;
                                            }
                                        </style>

                                        <a href="hapusmasuk.php?id=<?php echo $d['id_surat']; ?>">
                                            <i type="button" class="far fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>


                    </tbody>


                    <!-- MODAL EDIT -->
                    <?php include('edit_modal_masuk.php'); ?>
                    <!-- MODAL EDIT -->

                <?php
                            }
                        } else {
                            $data = mysqli_query($koneksi, "select * from tb_surat WHERE tipe='masuk'");
                            while ($d = mysqli_fetch_array($data)) {
                ?>


                    <tr>
                        <td scope="row"><?php echo $no++; ?></td>
                        <td><?php echo $d['no_surat']; ?></td>
                        <td><?php echo $d['tgl']; ?></td>
                        <td><?php echo $d['arsip']; ?></td>
                        <td><?php echo $d['pengirim']; ?></td>
                        <td><?php echo $d['perihal']; ?></td>
                        <td><?php echo $d['sifat'];
                                echo " . ";
                                echo $d['keaslian']; ?></td>

                        <td class=" center">
                            <a href="pdf.php?id=<?php echo $d['id_surat']; ?>" target="_blank"><i type="button" class="fas fa-file-download"></i></a>
                        </td>

                        <td style="color: #212529; text-decoration: none;">

                            <i type="button" class="far fa-edit" data-bs-toggle="modal" data-bs-target="#modaleditmasuk<?php echo $d['id_surat']; ?>" id="editmasuk"></i>
                            <style>
                                .modal-backdrop {
                                    z-index: -1;
                                }
                            </style>

                            <a href="hapusmasuk.php?id=<?php echo $d['id_surat'] ?>">
                                <i type="button" class="far fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>


                    </tbody>


                    <!-- MODAL EDIT -->
                    <?php include('edit_modal_masuk.php') ?>
                    <!-- MODAL EDIT -->


            <?php
                            }
                        } ?>
                </table>
            </div>
        </section>
        <!-- End About Section -->















        <!-- MODAL TAMBAH -->
        <div class="modal fade" id="modaltambahmasuk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Surat</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="tambah_masuk.php" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label"><i class="fas fa-list-ol"></i> Nomor Surat:</label>
                                <input type="text" class="form-control" id="recipient-name" name="no_surat">
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label"><i class="far fa-calendar-alt"></i> Tanggal Surat:</label>
                                <input class="form-control" type="date" id="message-text" name="tgl">
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label"><i class="far fa-window-restore"></i> Kode Arsip:</label>
                                <input class="form-control" id="message-text" name="arsip">
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label"><i class="far fa-paper-plane"></i> Pengirim:</label>
                                <input class="form-control" id="message-text" name="pengirim">
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label"><i class="far fa-clipboard"></i> Perihal:</label>
                                <input class="form-control" id="message-text" name="perihal">
                            </div>
                            <div class="mb-3">
                                <div class="column">
                                    <label for="message-text" class="col-form-label"><i class="fas fa-unlock-alt"></i> Sifat:</label>
                                    <div class="container">
                                        - Kerahasiaan
                                        <div class="col-lg-7">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sifat" value="U">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Umum
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sifat" value="R" checked>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Rahasia
                                                </label>
                                            </div>
                                        </div>
                                        <br> - Keaslian
                                        <div class="col-lg-7">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="keaslian" value="A">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Asli
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="keaslian" value="C" checked>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Copy
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="penerima" value="">
                            <input type="hidden" name="tembusan" value="">
                            <input type="hidden" name="tipe" value="masuk">
                            <div class="mb-3">
                                <label for="formFile" class="form-label"><i class="fas fa-file-pdf"></i> File PDF: <label style="color: red;">Harus memilih file</label></label>
                                <input class="form-control" type="file" name="nm_file" id="formFile">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary" name="" value="simpan_tambah">Simpan</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- MODAL TAMBAH -->




    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <!-- <footer id="footer">
        <div class="container">
            <h3>Brandon Johnson</h3>
            <p>Et aut eum quis fuga eos sunt ipsa nihil. Labore corporis magni eligendi fuga maxime saepe commodi placeat.</p>
            <div class="social-links">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
            <div class="copyright">
                &copy; Copyright <strong><span>MyResume</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer> -->
    <!-- End Footer -->


    <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/typed.js/typed.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/bmkg.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>