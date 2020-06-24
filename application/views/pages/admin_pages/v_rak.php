<div class="container-fluid">
    <div class="form-inline">
        <a class="btn btn-primary mb-3 btn-sm" href="<?=base_url('tambah-rak')?>"><i class="fa fa-plus"> Tambah Rak</i></a>
        <button type="button" class="btn btn-info mb-3 btn-sm ml-5">
            Jumlah Rak <span class="badge badge-light"><?= $jml_rak ?></span>
            <span class="sr-only">unread messages</span>
        </button>
    </div>
    <!-- alert -->
    <?= $this->session->userdata('pesan')?>
    <!-- alert -->
    <div class="table-responsive">
        <?php if(!empty($rak)): ?>
        <table id="dataTable" class="table table-bordered table-hover">
            <tr>
                <th>NO</th>
                <th>NAMA RAK</th>
                <th>STATUS</th>
                <th>EDIT</th>
                <th>HAPUS</th>
            </tr>
            <?php 
            $no = $this->uri->segment(4)+1;
            foreach($rak AS $row): ?>
            <?php 
                switch($row->status)
                {
                    case 1: $status = "aktif";
                            break;
                    case 0: $status = "tidak aktif";
                            break;
                }
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row->id_rak ?></td>
                    <td><?= $status ?></td>
                    <td><a class="btn btn-info btn-sm" href="<?=base_url('update-rak/'.$row->id_rak)?>"><i class="fa fa-edit"></i></a></td>
                    <td><a class="btn btn-danger btn-sm" href="<?=base_url('kelola/Rak/delete_rak/'.$row->id_rak)?>"><i class="fa fa-trash"></i></a></td>
                </tr>
            <?php endforeach; ?>
        </table>
            <?php else: ?>
                <h3 class="text-center"><strong>Maaf data tidak ditemukan</strong></h3>
            <?php endif; ?>
        <div>
            <?= $this->pagination->create_links(); ?>
        </div>
    </div>
</div>
