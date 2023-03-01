<?php
include "function/funcs.php";
$data_train_count = query("SELECT COUNT(*) FROM penerima_beasiswa")[0];

?>
<!DOCTYPE html>
<html lang="en">

<?php $title = "Halaman Utama || Tes Beasiswa";
include "header.php"; ?>

<body class="bg-img">
  <!-- Navbar -->
  <?php
  $pos = "fixed-top";
  $nav_active = "nav-item-1";
  include "navbar.php";
  ?>
  <!-- Navbar -->

  <!-- Content -->
  <div class="container-fluid">
    <div class="d-flex justify-content-center align-items-center gap-5 min-vh-100">
      <div class="welcome-text col-md-5 text-end">
        <h1 id="welcome-text">Test Beasiswa</h1>
        <script>
          setInterval(() => {
            let welcome_text = document.querySelector("#welcome-text");
            welcome_text.innerHTML == "Naive Bayes" ? welcome_text.innerHTML = "Test Beasiswa" : welcome_text.innerHTML = "Naive Bayes";
          }, 9000);
        </script>
        <div></div>
      </div>
      <div class="col-md-5 d-flex flex-column gap-3">
        <div class="menu-1 col-md-7 shadow">
          <h3>Data Latih</h3>
          <p>Total Data Latih: <span><?= $data_train_count["COUNT(*)"] ?></span></p>
          <p>Total data latih yang terdaftar di website</p>
        </div>
        <div class="menu-2 col-md-7 shadow">
          <h3>Cek Beasiswa</h3>
          <p>Cek hasil test beasiswa yang ada di website</p>
          <p>Cek beasiswa berdasarkan nama</p>
          <!--  -->
          <button type="submit" class="btn-tambah-data w-100" name="submit">Klik Disini!</button>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- Content -->
</body>

</html>