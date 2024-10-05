<?php
require 'function.php';

$id = $_GET['id'];
$siswa = query("SELECT * FROM siswa WHERE id_siswa = $id")[0];
$kelas = query("SELECT * FROM kelas");

if (isset($_POST['update'])) {
  if (update_siswa($_POST) > 0) {
    echo "<script>
            alert('data berhasil diupdate');
            document.location.href= 'index.php';
          </script>";
    // header('location: index.php');
  } else {
    echo "<script>
            alert('data berhasil diupdate');
            document.location.href= 'index.php';
          </script>";
  }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container my-3">
      <h1 class="my-3 text-center">Update Siswa</h1>
      <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="card">
            <h5 class="card-header">Featured</h5>
            <div class="card-body">
              <form action="" method="post">
                <div class="mb-3">
                  <input type="hidden" name="id" value="<?= $siswa['id_siswa'] ?>">
                  <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?= $siswa['nama'] ?>">
                </div>
                <div class="mb-3">
                  <select class="form-select form-select-sm" name="id_kelas" aria-label="Small select example">
                    <?php foreach ($kelas as $kls) : ?>
                      <?php if ($kls['id_kelas'] == $siswa['id_kelas']) : ?>
                          <option value="<?= $kls['id_kelas'] ?>" selected><?= $kls['kelas'] ?></option>
                        <?php else: ?>
                          <option value="<?= $kls['id_kelas'] ?>"><?= $kls['kelas'] ?></option>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </select>
                </div>
                <button type="submit" name="update" class="btn btn-primary">Simpan</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>