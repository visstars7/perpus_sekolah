<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-xs-12 mx-auto">
            <div class="w-50">
                <?= $this->session->flashdata('pesan'); ?>
            </div>
            <?php foreach($rak AS $row): ?>
                <?= form_open(base_url('kelola/Rak/update_rak/'.$row->id_rak)); ?>
                    <div class="form-group">
                        <label for='rak'>Nama rak buku</label>
                        <input class="form-control w-50" type='text' value="<?=$row->id_rak?>" name='nama_rak' id='rak' placeholder='Nama rak buku' readonly>
                    </div>
                    <div class="form-group">
                        <label for='rak'>Status Rak Buku</label>
                        <select class="custom-select" name="status" id="status">
                            <option id="opsi" value="1"<?=$row->status?'selected':false?>>Aktif</option>
                            <option id="opsi" value="0"<?=$row->status?false:'selected'?>>Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="form-inline">
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Ubah</button>
                        </div>
                        <div class="form-group ml-3">
                            <a class="btn btn-primary" href="<?=base_url('daftar-rak')?>">Kembali</a>
                        </div>
                    </div>
                <?= form_close(); ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>