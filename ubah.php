<?php session_start();

if( !isset( $_SESSION["login"] ) ) {
    header("Location: login.php");
    exit;
}
require_once("function.php");

// ambil data url
$id = $_GET["id"];

$s = query("SELECT * FROM siswa WHERE id = $id")[0];

if (isset ($_POST["submit"])) {
    

    if ( ubah($_POST) > 0) {
        echo "<script>
            alert('data berhasil diubah');
            document.location.href= 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('data gagal diubah');
            document.location.href= 'index.php';
        </script>";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>tambah data siswa</title>
    </head>
    <body>
        <h1>Edit Data Siswa</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $s["id"]; ?>">
            <input type="hidden" name="gambarlama" value="<?= $s["gambar"]; ?>">
            <ul>
                <li>
                    <label form="nama">Nama : </label>
                    <input type="text" name="nama" id="nama" required value="<?= $s["nama"]; ?>">
                </li>
                <li>
                    <label form="absen">Absen : </label>
                    <input type="text" name="absen" id="absen" required value="<?= $s["absen"]; ?>">
                </li>
                <li>
                    <label form="kelas">Kelas : </label>
                    <input type="text" name="kelas" id="kelas" required value="<?= $s["kelas"]; ?>">
                </li>
                <li>
                    <label form="jurusan">Jurusan : </label>
                    <input type="text" name="jurusan" id="jurusan" required value="<?= $s["jurusan"]; ?>">
                </li>
                <li>
                    <label form="gambar">Gambar : </label><br>
                    <img src="gambar/<?= $s["gambar"]; ?>" width="200"><br>
                    <input type="file" name="gambar" id="gambar">
                </li>
                <li>
                    <button type="submit" name="submit">Ubah Data!</button>
                </li>
            </ul>
        </from>
    </body>
</html>