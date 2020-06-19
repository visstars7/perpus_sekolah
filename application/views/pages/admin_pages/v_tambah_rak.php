<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-xs-12 mx-auto">
            <div class="w-50">
                <?= $this->session->flashdata('pesan'); ?>
            </div>
            <?= form_open(base_url('kelola/Rak/insert_rak')); ?>
                <div class="form-group">
                    <label for='rak'>Nama rak buku</label>
                    <input class="form-control w-50" type='text' name='nama_rak' id='rak' placeholder='Nama rak buku'>
                    <?= form_error('nama_rak',"<div class='color-red'><small>","</small></div>") ?>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>