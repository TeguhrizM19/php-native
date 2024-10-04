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

function tambah_siswa($data) {
  global $conn;

  $nama = $data['nama'];
  $id_kelas = $data['id_kelas'];

  $query = "INSERT INTO siswa VALUES ('', '$nama', '$id_kelas')";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);

}