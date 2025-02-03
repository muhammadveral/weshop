<div id="frame-tambah">
	<a class="tombol-action" href="<?php echo BASE_URL . "index.php?page=my_profile&module=kota&action=form"; ?>">+ Tambah Kota</a>
</div>

<?php

$queryKota = mysqli_query($koneksi, "SELECT * FROM kota ORDER BY kota ASC");

if (mysqli_num_rows($queryKota) == 0) {
	echo "<h3>Saat ini belum ada nama kota yang didalam database.</h3>";
} else {
	echo "<table class='table-list'>";

	echo "<tr class='baris-title'>
					<th class='kolom-nomor'>No</th>
					<th class='kolom-data'>Kota</th>
					<th class='kolom-data'>Tarif</th>
					<th class='status-action'>Status</th>
					<th class='status-action'>Action</th>
				 </tr>";

	$no = 1;
	while ($rowKota = mysqli_fetch_assoc($queryKota)) {
		echo "<tr>
						<td class='kolom-nomor'>$no</td>
						<td>$rowKota[kota]</td>
						<td>" . rupiah($rowKota['tarif']) . "</td>
						<td class='status-action'>$rowKota[status]</td>
						<td class='status-action'>
							<a class='button-status' href='" . BASE_URL . "index.php?page=my_profile&module=kota&action=form&kota_id=$rowKota[kota_id]" . "'> Edit </a>
						</td>
					 </tr>";

		$no++;
	}

	echo "</table>";
}
?>