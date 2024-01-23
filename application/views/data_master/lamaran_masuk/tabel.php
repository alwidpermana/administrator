<table class="table table-hover table-bordered table-striped nowrap align-middle text-center" id="datatable" width="100%">
	<thead>
		<tr>
			<th></th>
			<th>Jabatan</th>
			<th>Departemen</th>
			<th>Plant</th>
			<th>Nama</th>
			<th>Email</th>
			<th>No HP</th>
			<th>Tanggal Lahir</th>
			<th>Jenis Kelamin</th>
			<th>Status Pernikahan</th>
			<th>Jumlah Anak</th>
			<th>No KTP</th>
			<th>Alamat KTP</th>
			<th>Alamat Domisili</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data as $key): ?>
			<tr>
				<td>
					<button class="btn btn-icon btn-icon-only btn-sm btn-primary mb-1 pilih active-scale-down" type="button" data="<?=$key->pelamar_id?>" lamaranId = '<?=$key->id?>'>
                      <i class="cs-check"></i>
                    </button>
				</td>
				<td><?=$key->jabatan?></td>
				<td><?=$key->departemen?></td>
				<td><?=$key->plant?></td>
				<td><?=$key->nama?></td>
				<td><?=$key->email?></td>
				<td><?=$key->no_hp?></td>
				<td><?=$key->tgl_lahir?></td>
				<td><?=$key->jenis_kelamin?></td>
				<td><?=$key->status_pernikahan?></td>
				<td><?=$key->jml_anak?></td>
				<td><?=$key->no_ktp?></td>
				<td><?=$key->alamat_ktp?></td>
				<td><?=$key->alamat_domisili?></td>
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