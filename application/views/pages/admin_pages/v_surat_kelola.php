<div class="container-fluid">
    <?php if(!empty($surat)): ?>
    <div class="table-responsive">
        <table id="dataTable" class="table table-bordered table-stripped table-hover">
            <thead>   
                <tr>
                    <th>NO</th>
                    <th>ID SURAT</th>
                    <th>NAMA PETUGAS</th>
                    <th>JABATAN</th>
                    <th>TUJUAN</th>
                    <th>STATUS</th>
                    <th>DETAIL</th>
                    <th>HAPUS</th>
                </tr>
            </thead>
            <?php
            $no = $this->uri->segment(3)+1;
            foreach($surat AS $row): ?>
            <?php 
                $status = $row->status_surat_perintah ? "valid": "tidak valid"; 
            ?>
            <tbody>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row->id_surat; ?></td>
                <td><?= $row->nama_petugas; ?></td>
                <td><?= $row->nama_role; ?></td>
                <td><?= $row->tujuan; ?></td>
                <td><?= $status ?></td>
                <td><a class="btn btn-success btn-sm" href="<?=base_url('detail-surat/'.$row->id_surat)?>" target="__BLANK"><i class="fa fa-search-plus"></i></a></td>
                <td><a onclick="return confirm('cek dulu sebelum di hapus');" class="btn btn-danger btn-sm" href="<?=base_url('kelola/Surat/hapus/'.$row->id_surat)?>"><i class="fa fa-trash"></i></a></td>
            </tr>
            </tbody>
            <?php endforeach; ?>
        </table>
        <div class="pagination">
            <?= $this->pagination->create_links(); ?>
        </div>
    </div>
    <?php else: ?>
        <div class="text-center">
            <strong>Tidak Ada Surat Masuk Ditemukan</strong>
        </div>
    <?php endif; ?>
</div>