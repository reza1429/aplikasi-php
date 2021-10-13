<?php
session_start();
echo phpversion();

if( !isset( $_SESSION["login"] ) ) {
    header("Location: login.php");
    exit;
}

require 'function.php';
$siswa = query("SELECT * FROM siswa");

if(isset ($_POST["cari"])) {
    $siswa = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>halaman admin</title>
        <style>
            .loader{
                width: 90px;
                position: absolute;
                top: 129px;
                left: 325px;
                display: none;
            }
            @media print{
                .logout, .tambah, .cari{display: none;}
            }
        </style>
    </head>
    <body>
        <h1>Daftar Siswa</h1>
        <a href="logout.php" class="logout">logout</a><br>
        <a href="tambah.php" class="tambah">Tambah data siswa</a>
        <br><br>
        <form action="" method="post" class="cari">
            <input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian" autocomplete="off" id="keyword">
            <button type="submit" name="cari" id="tombol">Cari!</button>
            <img src="loader.gif" class="loader">
        </form>
        <div id="container">
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
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript" src="./js/script.js"></script>
    </body>
</html>
