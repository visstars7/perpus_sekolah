<div class="container-fluid">
    <?php if($surat): ?>
    <div class="table-responsive">
        <table class="table table-bordered table-stripped table-hover">
            <tr>
                <th>NO</th>
                <th>ID SURAT</th>
                <th>NAMA PETUGAS</th>
                <th>JABATAN</th>
                <th>TUJUAN</th>
                <th>STATUS</th>
                <th>DETAIL</th>
            </tr>
            <?php
            $no = 1;
            foreach($surat AS $row): ?>
            <?php 
                $status = $row->status_surat_perintah ? "valid": "tidak valid"; 
             ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row->id_surat; ?></td>
                <td><?= $row->nama_petugas; ?></td>
                <td><?= $row->nama_role; ?></td>
                <td><?= $row->tujuan; ?></td>
                <td><?= $status ?></td>
                <td><a class="btn btn-info" href="<?=base_url('detail-surat')?>"><i class="fa fa-search-plus"></i></a></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php else: ?>
        <div class="text-center">
            <strong>Data Tidak Ditemukan</strong>
        </div>
    <?php endif; ?>
</div>