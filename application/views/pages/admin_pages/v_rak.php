<div class="container-fluid">
    <a class="btn btn-primary mb-3 btn-sm" href="<?=base_url('tambah-rak')?>">Tambah Rak</a>
    <div class="table-responsive">
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
        <div>
            <?= $this->pagination->create_links(); ?>
        </div>
    </div>
</div>
