<?php 
require '../function.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM siswa WHERE
            nama like '%$keyword%'OR
            absen like '%$keyword%'OR
            kelas like '%$keyword%'OR
            jurusan like '%$keyword%'";
$siswa = query($query);
?>
<table border="1" cellpadding="10" cellspadiing="0">
            <tr>
                <th>No.</th>
                <th>Aksi</th>
                <th>Gambar</th>
                <th>Absen</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jurusan</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach($siswa as $row) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td>
                    <a href="ubah.php?id=<?php echo $row ["id"]; ?>">ubah</a> |
                    <a href="hapus.php?id=<?php echo $row ["id"]; ?>&gambar=<?= $row['gambar']?>" onclick="return confirm('yakin?');">hapus</a>
                </td>
                <td><img src="gambar/<?php echo $row ["gambar"]; ?>" width="100"></td>
                <td><?php echo $row ["absen"]; ?></td>
                <td><?php echo $row ["nama"]; ?></td>
                <td><?php echo $row ["kelas"]; ?></td>
                <td><?php echo $row ["jurusan"]; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>