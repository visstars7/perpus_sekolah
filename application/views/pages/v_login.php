
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Login-perpus</title>

        <!-- Custom fonts for this template-->
        <link href="<?=base_url('assets/templates/vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?=base_url('assets/css/pages/login.css')?>">
        <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->

        <!-- Custom styles for this template-->
        <link href="<?=base_url('assets/templates/css/sb-admin-2.min.css')?>" rel="stylesheet">
    </head>
    <body>
        <section id="content-login">
            <div class="row">
                <div id="kiri" class="col-lg-6 col-md-12  col-12">
                    <div class="header-logo text-center">LET'S BE</div>
                    <div class="subheader-logo text-center">MAGICIAN</div>
                    <img src="<?=base_url('assets/img/Bibliophile.gif')?>" alt="magic.gif">
                </div>
                <div id="samping" class="col-lg-6 col-md-12 col-12 text-center">
                    <section id="nav-top-mobile">
                        <span class="nav-span">S-Library</span>
                    </section>
                    <?= $this->session->flashdata('pesan'); ?>
                    <?= form_open(base_url('Login/Auth')); ?>
                        <div class="vertikal-center">
                            <input class="w-75 justify-content-center" type='text' name='username' id='username' placeholder='username'>
                            <?= form_error('username',"<small style='color:red'>","</small>"); ?>

                            <input class="w-75" type='password' name='userID' id='userID' placeholder='password'>
                            <? echo form_error('userID',"<small style='color:red'>","</small>"); ?>
                            <div class="form-group">
                                <button class="btn btn-warning w-75" type="submit">Submit</button>
                            </div>
                        </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </section>
        <!-- Bootstrap core JavaScript-->
        <script src=<?=base_url('assets/templates/vendor/jquery/jquery.min.js')?>></script>
        <script src=<?=base_url('assets/templates/vendor/bootstrap/js/bootstrap.bundle.min.js')?>></script>

        <!-- Core plugin JavaScript-->
        <script src="<?=base_url('assets/templates/vendor/jquery-easing/jquery.easing.min.js')?>"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?=base_url('assets/templates/js/sb-admin-2.min.js')?>"></script>

        <!-- Page level plugins -->
        <script src="<?=base_url('assets/templates/vendor/chart.js/Chart.min.js')?>"></script>

        <!-- Page level custom scripts -->
        <!-- <script src="<?=base_url('assets/templates/js/demo/chart-area-demo.js')?>"></script>
        <script src="<?=base_url('assets/templates/js/demo/chart-pie-demo.js')?>"></script> -->
    </body>
</html>
