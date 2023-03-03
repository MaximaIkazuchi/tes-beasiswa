<?php
include "function/funcs.php";

// pagination
$jumlahDataPerHalaman = 7;
$jumlahData = count(query("SELECT * FROM penerima_beasiswa"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET['page'])) ? $_GET['page'] : 1;
$offsetData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$data_train = query("SELECT * FROM penerima_beasiswa LIMIT $offsetData, $jumlahDataPerHalaman");

if (isset($_POST['submit'])) {
  if (insertDataTrain($_POST) > 0) {
    echo
    "<script>
      alert('Data berhasil ditambahkan!');
      location.href = 'data_train.php';
    </script>";
  } else {
    echo
    "<script>
      alert('Data gagal ditambahkan!');
    </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<?php $title = "List Data Latih || Tes Beasiswa";
include "header.php" ?>

<body>
  <!-- Navbar -->
  <?php
  $pos = "fixed-top";
  $nav_active = "nav-item-2";
  include "navbar.php";
  ?>
  <!-- Navbar -->

  <!-- Content -->
  <div class="container-fluid">
    <div class="d-flex justify-content-center align-items-center min-vh-100">
      <div class="area-table col-md-12 d-flex flex-column justify-content-center align-items-center">
        <!-- Table -->
        <div class="col-md-8 mx-auto p-3 rounded-4 shadow">
          <!-- Header Components -->
          <div class="d-flex justify-content-between">
            <h4 class="data-header my-auto">Data Latih</h4>
            <div class="my-auto">
              <form class="d-flex justify-content-center align-items-center gap-2 p-2" method="post">
                <div class="d-flex">
                  <input class="form-control form-control-sm" type="text" placeholder="Cari Data" autocomplete="off" id="search_data">
                  <button class="btn-search" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
              </form>
            </div>
          </div>
          <!-- Header Components -->

          <!-- Table Components -->
          <table class="table mt-2">
            <thead class="bg-thead text-white">
              <tr class="text-center">
                <th scope="col">No.</th>
                <th scope="col">Nama</th>
                <th scope="col">Usia</th>
                <th scope="col">Pekerjaan Orang Tua</th>
                <th scope="col">Status</th>
                <th scope="col">Nilai Raport</th>
                <th scope="col">Terima Beasiswa</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1;
              foreach ($data_train as $item) : ?>
                <tr class="text-center">
                  <td><?= $i ?></td>
                  <td><?= $item['nama'] ?></td>
                  <td><?= $item['usia'] ?></td>
                  <td><?= $item['pekerjaan_ortu'] ?></td>
                  <td><?= $item['status'] ?></td>
                  <td><?= $item['nilai_raport'] ?></td>
                  <td><?= $item['terima_beasiswa'] ?></td>
                </tr>
              <?php $i++;
              endforeach; ?>
            </tbody>
          </table>
          <!-- Table Components -->

          <!-- Footer Components -->
          <div class="d-flex justify-content-between">
            <button class="btn-tambah-data my-auto" type="button" data-bs-toggle="modal" data-bs-target="#modalTambahData">+ Tambah Data</button>
            <!-- Pagination Control -->
            <div class="d-flex">
              <ul class="pagination">
                <li class="page-item <?= ($halamanAktif <= 1) ? "disabled" : ""; ?>">
                  <a class="page-link" href="?page=<?= $halamanAktif - 1 ?>"><i class="fa-solid fa-caret-left"></i></a>
                </li>
                <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                  <li class="page-item <?= ($i == $halamanAktif) ? "active" : ""; ?>">
                    <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                  </li>
                <?php endfor; ?>
                <li class="page-item <?= ($halamanAktif >= $jumlahHalaman) ? "disabled" : ""; ?>">
                  <a class="page-link" href="?page=<?= $halamanAktif + 1 ?>"><i class="fa-solid fa-caret-right"></i></a>
                </li>
              </ul>
            </div>
            <!-- Pagination Control -->
          </div>
          <!-- Footer Components -->
        </div>
        <!-- Table -->

        <!-- Modal Tambah Data -->
        <div class="modal fade" id="modalTambahData">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title">Tambah Data</h3>
                <button class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">
                <form class="d-flex flex-column gap-3" method="post">
                  <div class="d-flex justify-content-between">
                    <div class="col-8">
                      <input class="form-control" name="nama" placeholder="Nama" type="text" id="nama" autocomplete="off">
                    </div>
                    <div class="col-4">
                      <input class="form-control" name="usia" placeholder="Usia" type="number" min="0" id="usia" autocomplete="off">
                    </div>
                  </div>
                  <div class="d-flex justify-content-between">
                    <div class="col-8">
                      <input class="form-control" name="pekerjaan_ortu" placeholder="Pekerjaan Orang Tua" type="text" id="pekerjaan_ortu" autocomplete="off">
                    </div>
                    <div class="col-4">
                      <input class="form-control" name="status" placeholder="Status" type="text" id="status" autocomplete="off">
                    </div>
                  </div>
                  <div class="col-12">
                    <input class="form-control" name="nilai_raport" placeholder="Nilai Raport" type="text" id="nilai_raport" autocomplete="off">
                  </div>
                  <div class="d-flex flex-column justify-content-center">
                    <label class="form-label" for="terima_beasiswa">Terima Beasiswa</label>
                    <select class="form-select" name="terima_beasiswa" id="terima_beasiswa">
                      <option value="ya">Ya</option>
                      <option value="tidak">Tidak</option>
                    </select>
                  </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-primary" type="submit" name="submit">Tambah</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Modal Tambah Data -->
      </div>
    </div>
  </div>
  <!-- Content -->

  <!-- Bootstrap JS -->
  <script src="stylesheet/bootstrap.bundle.min.js"></script>
</body>

</html>