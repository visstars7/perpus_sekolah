<div class="container">
    <div class="mb-3 form-inline">
        <button data-target="#exampleModal" data-toggle="modal" class="btn btn-primary btn-sm"><i class="fa fa-plus"> Tambah baris</i></a>
        <button type="button" class="btn btn-info btn-sm ml-5">
            Jumlah Baris Rak <span class="badge badge-light"><?= $jml_baris ?></span>
            <span class="sr-only">unread messages</span>
        </button>
    </div>
    <div class="text-center">
        <?= $this->session->flashdata('pesan'); ?>
    </div>
    <?php if(!empty($barisRak)): ?>
    <div class="table-responsive">
        <table class="table table-hover table-stripped">
            <tr>
                <th>NO</th>
                <th>ID BARIS RAK</th>
                <th>ID RAK</th>
                <th>KATEGORI BUKU</th>
                <th colspan="2">AKSI</th>
            </tr>
            <?php $no = $this->uri->segment(4)+1 ?>
            <?php foreach($barisRak AS $row): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row->id_baris_rak; ?></td>
                <td><?= $row->id_rak; ?></td>
                <td><?= $row->nama_ktg; ?></td>
                <td><a href="<?=base_url('update-baris/').$row->id_baris_rak?>" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a></td>
                <td><a href="<?=base_url('kelola/Rak/Delete_baris_rak/').$row->id_baris_rak?>" onclick="return confirm('yakin?');" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php else: ?>
        <h3 class="text-center"><strong>Maaf data tidak ditemukan</strong></h3>
    <?php endif; ?>
    <?= $this->pagination->create_links();?>
</div>


<!-- Modal Tambah -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Baris Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open(base_url('kelola/Rak/tambah_baris_rak')); ?>
            <!-- input nama rak -->
            <div class="form-group">
                <label for="rak">Nama Rak</label>
                <select name="rak" class="custom-select" id="rak">
                    <?php foreach($rak AS $row): ?>
                        <option value="<?= $row->id_rak?>"><?= $row->id_rak?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- input nama kategori -->
            <div class="form-group">
                <label for="rak">Nama Kategori</label>
                <select name="ktg" id="ktg" class="custom-select">
                    <?php foreach($ktg AS $row): ?>
                        <option value="<?= $row->id_ktg_buku?>"><?= $row->nama_ktg?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-inline">
                <button type="button" class="btn btn-secondary mr-3" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Kirim</button>
            </div>
        </div>
        <? form_close(); ?>
    </div>
  </div>
</div>