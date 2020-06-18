<!DOCTYPE html>
<html lang="en">

    <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Surat NO.<?=$surat->id_surat?></title>

    <!-- Custom fonts for this template-->
    <link href="<?=base_url('assets/templates/vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=base_url('assets/templates/css/sb-admin-2.min.css')?>" rel="stylesheet">

    <!-- custom css -->
    <link rel="stylesheet" href="<?=base_url('assets/css/pages/detail_surat.css')?>">

    <!-- Datatable -->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/DataTables/datatables.css')?>">

    </head>

    <body id="page-top">
    <div class="header-message mt-5">
        <h2 class="text-center"><i class="fas fa-book-reader"></i><strong> S-library</strong></h2>
    </div>
    <hr>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <div class="float-left">
                    <p>No: <?=$surat->id_surat?></p>
                    <p>yth.<?=$surat->nama_petugas?></p>
                    <p>B.G <?=$surat->nama_role?></p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="float-right">
                    <p><?= $surat->tgl_dibuat ?></p>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-12">
                <div class="float-left">
                    <p>Tujuan: <?= $surat->tujuan ?></p>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <p>Dengan hormat,</p>
                <div class="keterangan-surat">
                    <p><?=$surat->keterangan?></p>
                </div>
            </div>
        </div>
        <?php 
            $status = $surat->status_surat_perintah ? 'valid':'tidak valid';
        ?>
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="float-right">
                    <p>Status surat, <?= $status ?></p>
                </div>
            </div>
        </div>
    </div>
        </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; S-library</span>
                </div>
                </div>
            </footer>
            <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?=base_url('Logout')?>">Logout</a>
                </div>
            </div>
            </div>
        </div>





        <script>
            window.print();
        </script>

        <!-- Bootstrap core JavaScript-->
        <script src=<?=base_url('assets/templates/vendor/jquery/jquery.min.js')?>></script>
        <script src=<?=base_url('assets/templates/vendor/bootstrap/js/bootstrap.bundle.min.js')?>></script>

        <!-- Core plugin JavaScript-->
        <script src="<?=base_url('assets/templates/vendor/jquery-easing/jquery.easing.min.js')?>"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?=base_url('assets/templates/js/sb-admin-2.min.js')?>"></script>

        <!-- Page level plugins -->
        <script src="<?=base_url('assets/templates/vendor/chart.js/Chart.min.js')?>"></script>

        <!-- Datatable js -->
        
        <script type="text/javascript" charset="utf8" src="<?=base_url('assets/DataTables/datatables.js')?>"></script>
        <!-- Page level custom scripts -->
        <!-- <script src="<?=base_url('assets/templates/js/demo/chart-area-demo.js')?>"></script>
        <script src="<?=base_url('assets/templates/js/demo/chart-pie-demo.js')?>"></script> -->

    </body>

</html>