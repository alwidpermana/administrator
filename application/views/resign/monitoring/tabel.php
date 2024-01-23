<table class="table table-bordered table-hover table-striped nowrap align-middle text-center" id="datatable" width="100%">
   <thead>
      <tr>
        <th class="text-muted text-small text-uppercase" rowspan="3"></th>
        <th class="text-muted text-small text-uppercase" rowspan="3">Tanggal Input</th>
        <th class="text-muted text-small text-uppercase" rowspan="3">Nama Lengkap</th>
        <th class="text-muted text-small text-uppercase" rowspan="3">No KTP</th>
        <th class="text-muted text-small text-uppercase" rowspan="3">Alamat di KTP</th>
        <th class="text-muted text-small text-uppercase" rowspan="3">Alamat Tinggal</th>
        <th class="text-muted text-small text-uppercase" rowspan="3">No HP</th>
        <th class="text-muted text-small text-uppercase" rowspan="3">Email</th>
        <th class="text-muted text-small text-uppercase" rowspan="3">Tempat Lahir</th>
        <th class="text-muted text-small text-uppercase" rowspan="3">Tanggal Lahir</th>
        <th class="text-muted text-small text-uppercase" rowspan="3">Jenis Kelamin</th>
        <th class="text-muted text-small text-uppercase" rowspan="3">Status Pernikahan</th>
        <th class="text-muted text-small text-uppercase" rowspan="3">Jumlah Anak</th>
        <th class="text-muted text-small text-uppercase" rowspan="3">Golongan Darah</th>
        <th class="text-muted text-small text-uppercase" rowspan="3">Agama</th>
        <th class="text-muted text-small text-uppercase" rowspan="3">Tanggal Berakhir</th>
        <th class="text-muted text-small text-uppercase" rowspan="3">Alasan Keluar</th>
        <th class="text-muted text-small text-uppercase" colspan="11">Poin Pertimbangan</th>
        <th class="text-muted text-small text-uppercase" rowspan="3">Kategori</th>
        <th class="text-muted text-small text-uppercase" rowspan="3">Keterangan</th>
      </tr>
      <tr>
        <th class="text-muted text-small text-uppercase" colspan="3">Absensi</th>
        <th class="text-muted text-small text-uppercase" colspan="5">Pelanggaran Peraturan</th>
        <th class="text-muted text-small text-uppercase" rowspan="2">Attitude</th>
        <th class="text-muted text-small text-uppercase" rowspan="2">Produktivitas</th>
        <th class="text-muted text-small text-uppercase" rowspan="2">Lainnya</th>
      </tr>
      <tr>
        <th class="text-muted text-small text-uppercase">Sakit</th>
        <th class="text-muted text-small text-uppercase">Ijin</th>
        <th class="text-muted text-small text-uppercase">Alpa</th>
        <th class="text-muted text-small text-uppercase">Pembinaan</th>
        <th class="text-muted text-small text-uppercase">SP 1</th>
        <th class="text-muted text-small text-uppercase">SP 2</th>
        <th class="text-muted text-small text-uppercase">SP 3</th>
        <th class="text-muted text-small text-uppercase">Pelanggaran Berat</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data as $key): ?>
        <tr>
          <td>
            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
              <a href="<?=base_url()?>resign/view/<?=$key->id?>" class="btn btn-primary active-scale-down" target="_blank"><i class="bi bi-eye"></i></a>
              <a href="<?=base_url()?>resign/edit/<?=$key->id?>" class="btn btn-primary active-scale-down" target="_blank"><i class="bi bi-pencil"></i></a>
              <a href="javascript:;" data="<?=$key->id?>" class="btn btn-primary active-scale-down hapus"><i class="bi bi-trash"></i></a>
            </div>
          </td>
          <td><?=date("Y-m-d", strtotime($key->created_at))?></td>
          <td><?=$key->nama?></td>
          <td><?=$key->no_ktp?></td>
          <td><?=$key->alamat_ktp?></td>
          <td><?=$key->alamat_domisili?></td>
          <td><?=$key->no_hp?></td>
          <td><?=$key->email?></td>
          <td><?=$key->tempat_lahir?></td>
          <td><?=$key->tgl_lahir?></td>
          <td><?=$key->jenis_kelamin?></td>
          <td><?=$key->status_pernikahan?></td>
          <td><?=$key->jml_anak?></td>
          <td><?=$key->golongan_darah?></td>
          <td><?=$key->agama?></td>
          <td><?=$key->tgl_berakhir?></td>
          <td><?=$key->alasan_keluar?></td>
          <td><?=$key->sakit?></td>
          <td><?=$key->ijin?></td>
          <td><?=$key->alpa?></td>
          <td><?=$key->pembinaan?></td>
          <td><?=$key->sp1?></td>
          <td><?=$key->sp2?></td>
          <td><?=$key->sp3?></td>
          <td><?=$key->pelanggaran_berat?></td>
          <td><?=$key->attitude?></td>
          <td><?=$key->produktivitas?></td>
          <td><?=$key->lainnya?></td>
          <td><?=$key->kategori?></td>
          <td><?=$key->keterangan?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
</table>
<script type="text/javascript">
  var table = $('#datatable').DataTable( {
          scrollY:        "450px",
          scrollX:        true,
          scrollCollapse: true,
          paging:         false,
          info: false,
          'ordering':false,
          'searching': false,
      } ); 
</script>