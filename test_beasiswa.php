<?php
include "function/funcs.php";
$penerima_beasiswa = query("SELECT * FROM penerima_beasiswa");

// untuk value dropdown
foreach ($penerima_beasiswa as $item) {
  $pekerjaan_ortu[] = $item['pekerjaan_ortu'];
  $status[] = $item['status'];
  $nilai_raport[] = $item['nilai_raport'];
}
?>
<!DOCTYPE html>
<html lang="en">

<?php $title = "Cek Beasiswa || Tes Beasiswa";
include "header.php"; ?>

<body>
  <!-- Navbar -->
  <?php
  $pos = "fixed-top";
  $nav_active = "nav-item-3";
  include "navbar.php";
  ?>
  <!-- Navbar -->

  <!-- Content -->
  <div class="container-fluid">
    <div class="d-flex justify-content-center align-items-center min-vh-100">
      <!-- Form -->
      <form class="cek-form col-md-7 d-flex flex-column gap-2 p-4 rounded-4 shadow" action="hasil.php" method="post">
        <h3>Test Beasiswa</h3>
        <div class="d-flex justify-content-between">
          <div class="col-7">
            <label class="form-label" for="nama">Nama :</label>
            <input class="form-control form-control-sm" type="text" placeholder="Masukkan Nama Anda" name="nama" id="nama" autocomplete="off">
          </div>
          <div class="col-5">
            <label class="form-label" for="usia">Usia :</label>
            <input class="form-control form-control-sm" type="number" placeholder="Masukkan Usia Anda" name="usia" min="0" id="usia" autocomplete="off">
          </div>
        </div>
        <div class="d-flex justify-content-between">
          <div class="col-7">
            <label class="form-label" for="pekerjaan_ortu">Pekerjaan Orang Tua :</label>
            <select class="form-select form-select-sm" name="pekerjaan_ortu" id="pekerjaan_ortu">
              <option selected>Pilih Pekerjaan</option>
              <?php foreach (array_unique($pekerjaan_ortu) as $item) : ?>
                <option value="<?= $item ?>"><?= $item ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-5">
            <label class="form-label" for="status">Status :</label>
            <select class="form-select form-select-sm" name="status" id="status">
              <option selected>Pilih Status</option>
              <?php foreach (array_unique($status) as $item) : ?>
                <option value="<?= $item ?>"><?= $item ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div>
          <label class="form-label" for="nilai_raport">Nilai Raport :</label>
          <select class="form-select form-select-sm" name="nilai_raport" id="nilai_raport">
            <option selected>Pilih Nilai Raport</option>
            <?php foreach (array_unique($nilai_raport) as $item) : ?>
              <option value="<?= $item ?>"><?= $item ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <button class="btn-tambah-data" name="submit" type="submit" data-bs-toggle="modal" data-bs-target="#modal">Cek</button>
      </form>
      <!-- Form -->
    </div>
  </div>
  <!-- Content -->
</body>

</html>