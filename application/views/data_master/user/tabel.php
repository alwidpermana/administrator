<table class="table table-hover table-bordered table-striped nowrap align-middle text-center" id="datatable" width="100%">
	<thead>
		<tr>
			<th>email</th>
			<th>Nama</th>
			<th>Jenis</th>
			<th>Tanggal</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data as $key): ?>
			<tr>
				<td><?=$key->email?></td>
				<td><?=$key->nama?></td>
				<td><?=$key->jenis?></td>
				<td><?=date("Y-m-d", strtotime($key->created_at))?></td>
				<td><?=$key->status?></td>
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