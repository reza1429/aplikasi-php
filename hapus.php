<?php 
session_start();

if( !isset( $_SESSION["login"] ) ) {
    header("Location: login.php");
    exit;
}
require 'function.php';

$id = $_GET["id"];
$gambar = $_GET["gambar"];


if( hapus($id,$gambar) > 0 ){
    echo "<script>
            alert('data berhasil dihapus');
            document.location.href= 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('data gagal dihapus');
            document.location.href= 'index.php';
        </script>";
    }
?>