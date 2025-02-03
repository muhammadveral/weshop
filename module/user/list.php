<?php
$no = 1;

$queryAdmin = mysqli_query($koneksi, "SELECT * FROM user ORDER BY nama ASC");

if (mysqli_num_rows($queryAdmin) == 0) {
    echo "<h3>Saat ini belum ada data user yang dimasukan</h3>";
} else {
    echo "<table class='table-list'>";

    echo "<tr class='baris-title'>
                    <th class='kolom-nomor'>No</th>
                    <th class='kolom-data'>Nama</th>
                    <th class='kolom-data'>Email</th>
                    <th class='kolom-data'>Phone</th>
                    <th class='kolom-data'>Level</th>
                    <th class='status-action'>Status</th>
                    <th class='status-action'h>Action</th>
                 </tr>";

    while ($rowUser = mysqli_fetch_array($queryAdmin)) {
        echo "<tr>
                        <td class='kolom-nomor'>$no</td>
                        <td class = 'kolom-data'>$rowUser[nama]</td>
                        <td class = 'kolom-data'>$rowUser[email]</td>
                        <td class = 'kolom-data'>$rowUser[phone]</td>
                        <td class = 'kolom-data'>$rowUser[level]</td>
                        <td class='status-action'>$rowUser[status]</td>
                        <td class='button-action'><a class = 'button-status' href='" . BASE_URL . "index.php?page=my_profile&module=user&action=form&user_id=$rowUser[user_id]" . "'>Edit</a></td>
                     </tr>";

        $no++;
    }

    //AKHIR DARI TABLE
    echo "</table>";
}
