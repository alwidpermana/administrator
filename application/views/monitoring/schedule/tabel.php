<table class="table table-bordered table-hover table-striped nowrap align-middle text-center" id="datatable" width="100%">
	<thead>
		<tr>
			<th rowspan="3"></th>
			<th rowspan="3">No</th>
			<th colspan="4">Identitas</th>
			<th colspan="3">Klasifikasi</th>
			<th colspan="9">Tahap 1 - Tes basic</th>
			<th colspan="10">Tahap 2 - Penilaian Lapangan & Evaluasi</th>
			<th rowspan="3">Overall Status</th>
		</tr>
		<tr>
			<th rowspan="2">NIP</th>
			<th rowspan="2">Nama Lengkap</th>
			<th rowspan="2">No KTP</th>
			<th rowspan="2">No HP</th>
			<th rowspan="2">Jenis</th>
			<th rowspan="2">Sub</th>
			<th rowspan="2">Type</th>
			<th colspan="3">Jadwal Tes</th>
			<th colspan="4">Tes</th>
			<th rowspan="2">Komitmen</th>
			<th rowspan="2">Hasil Tes</th>
			<th rowspan="2">No Rek Tes</th>
			<th colspan="2">jadwal Tes H1</th>
			<th colspan="2">jadwal Tes H2</th>
			<th colspan="2">jadwal Tes H3</th>
			<th colspan="2">Tes</th>
			<th rowspan="2">Hasil Tes Basic</th>
		</tr>
		<tr>
			<th>Tanggal</th>
			<th>No Rek Tes</th>
			<th>Kehadiran</th>
			<th>Tertulis</th>
			<th>Fisik</th>
			<th>Keterampilan</th>
			<th>Interview</th>
			<th>Tanggal</th>
			<th>Kehadiran</th>
			<th>Tanggal</th>
			<th>Kehadiran</th>
			<th>Tanggal</th>
			<th>Kehadiran</th>
			<th>Lapangan</th>
			<th>Materi Kelas</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data as $key): ?>
			<tr>
				<td>
					<a href="<?=base_url()?>monitoring/view_lamaran/<?=$key->id?>" class="btn btn-icon btn-icon-only btn-outline-primary active-scale-down" target="_blank">
						<i class="bi bi-eye"></i>
					</a>
				</td>
				<td><?=$offset++?></td>
				<td><?=$key->nip?></td>
				<td><?=$key->nama?></td>
				<td><?=$key->no_ktp?></td>
				<td><?=$key->no_hp?></td>
				<td><?=$key->jenis?></td>
				<td><?=$key->sub?></td>
				<td><?=$key->type?></td>
				<td><?=$key->tgl_tahap_1?></td>
				<td><?=$key->no_tahap_1?></td>
				<td><?=$key->kehadiran_1?></td>
				<td><?=$key->tes_tertulis?></td>
				<td><?=$key->tes_fisik?></td>
				<td><?=$key->tes_keterampilan_motorik?></td>
				<td><?=$key->tes_interview?></td>
				<td><?=$key->komitmen_ttd_pernyataan?></td>
				<td><?=$key->hasil_tes_1?></td>
				<td><?=$key->no_rek?></td>
				<td><?=$key->tgl_h1?></td>
				<td><?=$key->jadwal_h1_kehadiran?></td>
				<td><?=$key->tgl_h2?></td>
				<td><?=$key->jadwal_h2_kehadiran?></td>
				<td><?=$key->tgl_h3?></td>
				<td><?=$key->jadwal_h3_kehadiran?></td>
				<td><?=$key->tes_lapangan_training?></td>
				<td><?=$key->tes_materi_kelas?></td>
				<td><?=$key->hasil_tes_2?></td>
				<td><?=$key->hasil_tes?></td>
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