<div class="container">
    <?= form_open(base_url('kelola/Rak/updated_baris_rak')); ?>
        <div class="form-group">
            <label for='id_baris_rak'>ID BARIS RAK</label>
            <input type='text' class="form-control" name='id_baris_rak' value="<?=$baris->id_baris_rak?>" id='id_baris_rak' placeholder="<?=$baris->id_baris_rak?>" readonly >
        </div>
        <div class="form-group">
            <label for="rak">ID RAK</label>
            <select class="custom-select" name="rak" id="rak">
                <?php foreach($rak AS $row): ?>
                    <option value="<?=$row->id_rak?>"<?= $row->id_rak == $baris->id_rak?'selected':false; ?> disabled><?=$row->id_rak?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="ktg">NAMA KATEGORI</label>
            <select name="ktg" id="ktg" class="custom-select">
                <?php foreach($ktg AS $row): ?>
                    <option value="<?=$row->id_ktg_buku?>" <?= $baris->id_ktg_buku == $row->id_ktg_buku?'selected':false; ?> ><?=$row->nama_ktg?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-inline">
            <button onclick="return confirm('cek kembali sebelum kirim!');" class="btn btn-success" type="submit">kirim</button>
            <a href="<?=base_url('baris-rak')?>" class="btn btn-primary ml-3">Kembali</a>
        </div>
    <?= form_close(); ?>
</div>