<?php 
session_start();

if( !isset( $_SESSION["login"] ) ) {
    header("Location: login.php");
    exit;
}
require_once("function.php");

if (isset ($_POST["submit"])) {
    

    if ( tambah($_POST) > 0) {
        echo "<script>
            alert('data berhasil ditambahkan');
            document.location.href= 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('data gagal ditambahkan');
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
        <h1>Tambah Data Siswa</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <ul>
                <li>
                    <label form="nama">Nama : </label>
                    <input type="text" name="nama" id="nama">
                </li>
                <li>
                    <label form="absen">Absen : </label>
                    <input type="text" name="absen" id="absen">
                </li>
                <li>
                    <label form="kelas">Kelas : </label>
                    <input type="text" name="kelas" id="kelas">
                </li>
                <li>
                    <label form="jurusan">Jurusan : </label>
                    <input type="text" name="jurusan" id="jurusan">
                </li>
                <li>
                    <label form="gambar">Gambar : </label>
                    <input type="file" name="gambar" id="gambar">
                </li>
                <li>
                    <button type="submit" name="submit">Tambah Data!</button>
                </li>
            </ul>
        </from>
    </body>
</html>