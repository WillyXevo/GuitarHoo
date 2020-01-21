<table class="table">
	<thead>
		<tr>
			<th>No</th>
			<th>User</th>
			<th>Lagu</th>
			<th>Date</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$sql = "SELECT a.user, b.nama_artist, b.judul_lagu, a.date_access FROM tblhistory a JOIN tblsong b ON a.id_song = b.id_song ORDER BY 4 DESC";
			$res = $db->query($sql);
			$i=0;
			while ($row = $res->fetchArray()) {
		?>
			<tr>
				<td><?= ++$i; ?></td>
				<td><?= $row['user']; ?></td>
				<td><?= $row['nama_artist']." - ".$row['judul_lagu']; ?></td>
				<td><?= $row['date_access']; ?></td>
			</tr> 
		<?php
			}
		?>
	</tbody>
</table>