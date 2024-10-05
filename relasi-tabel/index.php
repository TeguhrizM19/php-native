<?php
include 'function.php';

$kelas = query("SELECT * FROM kelas");
$siswa = query("SELECT * FROM siswa");

if (isset($_POST['simpan-siswa'])) {
  if (tambah_siswa($_POST) > 0) {
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
      <h1 class="my-3 text-center">Data Siswa</h1>
      <div class="row justify-content-center">
        <div class="col-md-10">
          
          <div class="card text-bg-light mb-3">
            <div class="card-header">
              <!-- Button trigger modal 1 (Tambah siswa) -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop-1">
                Tambah Siswa
              </button>
              
              <!-- Button trigger modal 2 (Tambah kelas) -->
              <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop-2">
                Tambah Kelas
              </button>
            </div>

            <div class="card-body">
              <table class="table table-bordered border-dark table-light">
                <thead class="table-group-divider table-secondary">
                  <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody class="table-group-divider">
                  <?php $no = 1; ?>
                  <?php foreach ($siswa as $sw) : ?>
                    <tr>
                      <th scope="row" class="text-center"><?= $no; ?></th>
                      <td><?= $sw['nama'] ?></td>
                      <td>
                        <?php foreach ($kelas as $kls) : ?>
                          <?php if ($kls['id_kelas'] == $sw['id_kelas']) {
                            echo $kls['kelas'];
                          } ?>
                        <?php endforeach; ?>
                      </td>
                      <td>
                        <a href="update.php?id=<?= $sw['id_siswa']; ?>" class="btn btn-warning">edit</a>
                        <a href="delete.php?id=<?= $sw['id_siswa']; ?>" class="btn btn-danger">hapus</a>
                      </td>
                    </tr>
                  <?php $no++ ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>

  <!-- Modal 1 (Tambah siswa) -->
  <div class="modal fade" id="staticBackdrop-1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel-1">Tambah Siswa</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" method="post">
            <div class="mb-3">
              <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama">
            </div>
            <div class="mb-3">
              <select class="form-select form-select-sm" name="id_kelas" aria-label="Small select example">
                <option selected>Pilih Kelas</option>
                <?php foreach ($kelas as $kls) : ?>
                  <option value="<?= $kls['id_kelas'] ?>"><?= $kls['kelas'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="simpan-siswa" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal 2 (Tambah kelas) -->
  <div class="modal fade" id="staticBackdrop-2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel-2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel-2">Tambah Kelas</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" method="post">
            <div class="mb-3">
            <!-- <input type="text" class="form-control" id="nama" placeholder="Kelas" name="kelas"> -->
              <select class="form-select form-select-sm" name="kelas" aria-label="Small select example">
                <option selected>Pilih Kelas</option>
                <option>A</option>
                <option>B</option>
                <option>C</option>
                <option>D</option>
              </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="simpan_kelas" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
    
</html>