<?php
$link = mysqli_connect('sql313.epizy.com', 'epiz_30034547', 'kd8W8diw0myy', 'epiz_30034547_phpdasar');
// if (!$link) {
//     die('Could not connect: ' . mysqli_error($link));
// }
// echo 'Connected successfully';


function query($query) {
    global $link;
    $result = mysqli_query($link, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data) {
    global $link;
    $nama = htmlspecialchars($data["nama"]);
    $absen = htmlspecialchars($data["absen"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    $gambar = upload();
    if( !$gambar ) {
        return false;
    }

    $query = "INSERT INTO siswa 
    ('id', 'nama', 'absen', 'kelas', 'jurusan', 'gambar')
    VALUES
    ('', '$nama', '$absen', '$kelas', '$jurusan', '$gambar')";
    mysqli_query($link, $query);
    return mysqli_affected_rows($link);


}
function upload() {
    // cek udh upload foto atau blm
    $namafile = $_FILES['gambar']['name'];
    $ukuran = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpname = $_FILES['gambar']['tmp_name'];

    if($error === 4) {
        echo "<script>
        alert('pilih gambar terlebih dahulu!');
        </script>";
        return false;
    }
    // cek tipe file
    $ekstensigambarvalid = ['jpg', 'jpeg', 'png'];
    $ekstensigambar = explode('.',  $namafile);
    $ekstensigambar = strtolower(end($ekstensigambar));

    if(!in_array($ekstensigambar, $ekstensigambarvalid)){
        echo "<script>
        alert('yang anda pilih bukan gambar!');
        </script>";
        return false;
    }
    // cek ukuran
    if($ukuran > 2000000){
        echo "<script>
        alert('gambar yang anda pilih terlalu besar!');
        </script>";
        return false;
    }
    // jika semua langkah berhasil dilalui
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensigambar;

    move_uploaded_file($tmpname, 'gambar/'. $namafilebaru);

    return $namafilebaru;
}

function hapus($id,$gambar) {
    global $link;

    unlink('gambar/'.$gambar);

    mysqli_query($link, "DELETE FROM siswa WHERE id = $id");

    return mysqli_affected_rows($link);
}
function ubah($data) {
    global $link;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $absen = htmlspecialchars($data["absen"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambarlama = htmlspecialchars($data["gambarlama"]);
    // cek data
    if($_FILES['gambar']['error']===4){
        $gambar = $gambarlama;
    } else {
        unlink('gambar/'.$gambarlama);
        $gambar = upload();
    }
    

    $query = "UPDATE siswa SET
                Nama = '$nama',
                Absen = '$absen',
                Kelas = '$kelas',
                Jurusan = '$jurusan',
                Gambar = '$gambar'
                WHERE id = $id
            ";
    mysqli_query($link, $query);
    return mysqli_affected_rows($link);
}
function cari($keyword) {
    $query = "SELECT * FROM siswa WHERE
                nama like '%$keyword%'OR
                absen like '%$keyword%'";
                return query($query);
}
function register($data) {
    global $link;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($link, $data["password"]);
    $password2 = mysqli_real_escape_string($link, $data["password2"]);

    // cek apaah usrermame sdh ada atau blm
    $result = mysqli_query($link, "SELECT username FROM user WHERE username = '$username'");

    if(mysqli_fetch_assoc($result)){
        echo "<script>
        alert('username sudah terdaftar!');
        </script>";
        return false;
    }

    if($password !== $password2){
        echo "<script>
        alert('password berbeda!');
        </script>";
        return false;
    }
    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // memasukkan ke database
    mysqli_query($link, "INSERT INTO user VALUES(null, '$username', '$password')");

    return mysqli_affected_rows($link);
}
?>