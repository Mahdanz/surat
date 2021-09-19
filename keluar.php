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
                    <h2>Surat Keluar</h2>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <form action="keluar.php" method="get">
                            <div class="input-group">
                                <input type="search" name="cari" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                <button type="submit" value="cari" class="btn btn-outline-primary">cari</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-7">
                        <form method="POST" action="">
                            <table>
                                <tr>

                                    <td><input type="date" placeholder="Start" name="date1" required="required" class="me-3"></td>
                                    <td> - </td>
                                    <td><input type="date" placeholder="End" name="date2" required="required" class="ms-3"></td>
                                    <td><input type="submit" class="btn btn-primary ms-3" name="search" value="Filter"></td>
                                </tr>
                            </table>
                        </form>
                        <!-- <form class="form-inline" method="POST" action="">
                            <label>Date:</label>
                            <input type="date" class="form-control" placeholder="Start" name="date1" />
                            <label>To</label>
                            <input type="date" class="form-control" placeholder="End" name="date2" />
                            <button class="btn btn-primary" name="search">Filter</button> <a href="index.php" type="button" class="btn btn-success"><span class="glyphicon glyphicon-refresh"><span></a>
                        </form> -->

                    </div>

                    <!-- <div class="col">
                        <div class="col-lg-7">
                            <form method="POST" class="form-inline">
                                <input type="date" name="tgl_mulai" class="form-control">
                                <input type="date" name="tgl_selesai" class="form-control mt-3">
                                <button type="submit" name="filter_tgl" class="btn btn-secondary mt-3">Filter</button>
                            </form>
                        </div>
                    </div> -->
                    <div class="col-lg-1 pt-1 pt-lg-0 content">
                        <div class="dropdown">
                            <button class="btn btn-secondary" type="button" data-bs-toggle="modal" data-bs-target="#modaltambahkeluar" id="tambahkeluar">
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
                            <th scope="col">Penerima</th>
                            <th scope="col">Tembusan</th>
                            <th scope="col">Perihal</th>
                            <th scope="col">Sifat</th>
                            <th scope="col">File</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $no = 1;
                        $batas = 1;
                        $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                        $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                        $previous = $halaman - 1;
                        $next = $halaman + 1;

                        $data_hal = mysqli_query($koneksi, "select * from tb_surat");
                        $jumlah_data = mysqli_num_rows($data_hal);
                        $total_halaman = ceil($jumlah_data / $batas);

                        if (isset($_GET['cari'])) {
                            $cari = $_GET['cari'];
                            $data = mysqli_query($koneksi, "select * from tb_surat where tipe ='keluar' AND no_surat like '%" . $cari . "%' OR tgl like '%" . $cari . "%' OR arsip like '%" . $cari . "%' OR pengirim like '%" . $cari . "%' OR perihal like '%" . $cari . "%' OR nm_file like '%" . $cari . "%' ORDER BY id_surat ASC ");
                            while ($d = mysqli_fetch_array($data)) {
                        ?>

                                <?php include 'list.php' ?>


                    </tbody>


                    <!-- MODAL EDIT -->
                    <?php include('edit_modal_keluar.php'); ?>
                    <!-- MODAL EDIT -->

                <?php
                            }
                        } elseif (isset($_POST['search'])) {
                            $date1 = date("Y-m-d", strtotime($_POST['date1']));
                            $date2 = date("Y-m-d", strtotime($_POST['date2']));
                            $data = mysqli_query($koneksi, "SELECT * FROM tb_surat WHERE tgl BETWEEN '$date1' AND '$date2'");
                            while ($d = mysqli_fetch_assoc($data)) {
                ?>
                    <?php include 'list.php' ?>

                    <!-- MODAL EDIT -->
                    <?php include('edit_modal_keluar.php') ?>
                    <!-- MODAL EDIT -->



                <?php
                            }
                        } else {
                            $data = mysqli_query($koneksi, "select * from tb_surat WHERE tipe='keluar'  limit $halaman_awal, $batas");
                            $nomor = $halaman_awal + 1;
                            while ($d = mysqli_fetch_array($data)) {
                ?>


                    <?php include 'list.php' ?>

                    </tbody>


                    <!-- MODAL EDIT -->
                    <?php include('edit_modal_keluar.php') ?>
                    <!-- MODAL EDIT -->


            <?php
                            }
                        } ?>
                </table>

                <nav>
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" <?php if ($halaman > 1) {
                                                        echo "href='?halaman=$previous'";
                                                    } ?>>Previous</a>
                        </li>
                        <?php
                        for ($x = 1; $x <= $total_halaman; $x++) {
                        ?>
                            <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                        <?php
                        }
                        ?>
                        <li class="page-item">
                            <a class="page-link" <?php if ($halaman < $total_halaman) {
                                                        echo "href='?halaman=$next'";
                                                    } ?>>Next</a>
                        </li>
                    </ul>
                </nav>

            </div>
        </section>
        <!-- End About Section -->















        <!-- MODAL TAMBAH -->
        <div class="modal fade" id="modaltambahkeluar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Surat</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="tambah_keluar.php" enctype="multipart/form-data">
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
                                <label for="message-text" class="col-form-label"><i class="far fa-paper-plane"></i> Penerima:</label>
                                <input class="form-control" id="message-text" name="penerima">
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label"><i class="far fa-paper-plane"></i> Tembusan:</label>
                                <input class="form-control" id="message-text" name="tembusan">
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
                            <input type="hidden" name="pengirim" value="">
                            <input type="hidden" name="tipe" value="keluar">
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