<?php

$conn = mysqli_connect('localhost', 'root', '', 'relasi_tabel');

function query($query) {
  global $conn;
  $data = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($data)) {
    $rows[] = $row;
  }
  return $rows;
}

if (isset($_POST['simpan_kelas'])) {
  $kelas = $_POST['kelas'];

  $query = mysqli_query($conn, "INSERT INTO kelas VALUES ('', '$kelas')");
  if ($query) {
    echo "<script>
            alert('data berhasil disimpan');
            document.location.href= index.php;
          </script>";
    // header('location: index.php');
  } else {
    echo "<script>
            alert('data berhasil disimpan');
            document.location.href= index.php;
          </script>";
  }
}

if (isset($_POST['simpan-siswa'])) {
  $nama = htmlspecialchars($_POST['nama']);
  $id_kelas = htmlspecialchars($_POST['id_kelas']);

  $query = mysqli_query($conn, "INSERT INTO siswa (nama, id_kelas) 
                                      VALUES ('$nama', '$id_kelas')");
  if ($query) {
    header('location: index.php');
    // echo "<script>
    //         alert('data berhasil disimpan');
    //         document.location.href= index.php;
    //       </script>";
  } else {
    header('location: index.php');
    // echo "<script>
    //         alert('data berhasil disimpan');
    //         document.location.href= index.php;
    //       </script>";
  }
}
// function tambah_siswa($data) {
//   global $conn;

//   $nama = htmlspecialchars($data['nama']);
//   $id_kelas = htmlspecialchars($data['id_kelas']);

//   $query = "INSERT INTO siswa VALUES ('', '$nama', '$id_kelas')";

//   mysqli_query($conn, $query);

//   return mysqli_affected_rows($conn);
// }

function update_siswa($ubah) {
  global $conn;

  $id = $ubah['id'];
  $nama = $ubah['nama'];
  $id_kelas = $ubah['id_kelas'];

  $query = "UPDATE siswa SET nama = '$nama', id_kelas = '$id_kelas' WHERE id_siswa = $id";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}