<?php
include "function/funcs.php";
if (isset($_POST['submit'])) {
  $resultClassify = naivebayes($_POST);
  $compare = ($resultClassify == "Selamat, Anda telah lulus!") ? ">" : "<";
  $calculateInfo = $_POST['calculateInfo'];
} else {
  header("Location: test_beasiswa.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<?php $title = "Hasil Test || Tes Beasiswa";
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
      <div class="hasil col-md-9 d-flex flex-column align-items-center p-3">
        <h2 class="p-2"><?= $resultClassify ?></h2>
        <table class="table table-borderless">
          <thead class="text-center border-bottom border-2">
            <td colspan="3">Summary</td>
          </thead>
          <tbody>
            <?php foreach (array_splice($_POST, 0, 5) as $key => $values) : ?>
            <tr>
              <td class="w-50 text-end"><?= $key ?></td>
              <td>:</td>
              <td class="w-50 text-start"><?= $values ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <button class="btn-tambah-data" data-bs-toggle="modal" data-bs-target="#modal">Detail</button>
      </div>
      <!-- Modal -->
      <div class="modal modal-xl fade" id="modal">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title">Detail Probabilitas</h3>
              <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body d-flex justify-content-center">
              <div class="row w-100 d-flex justify-content-between">
                <div class="col-5">
                  <table class="table">
                    <thead class="thead-hasil">
                      <tr class="text-center">
                        <th scope="col" colspan="3">Ya</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($calculateInfo['probability_y'] as $key => $value) :
                        $resultText = ($key == array_key_last($calculateInfo['probability_y'])) ? "resultText" : ""; ?>
                        <tr>
                          <td><?= $key ?></td>
                          <td>=</td>
                          <td class="text-end <?= $resultText ?>"><?= $value; ?></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <div class="col-2 d-flex justify-content-center align-items-center">
                  <h1><?= $compare ?></h1>
                </div>
                <div class="col-5">
                  <table class="table">
                    <thead class="thead-hasil-no">
                      <tr class="text-center">
                        <th scope="col" colspan="4">Tidak</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($calculateInfo['probability_n'] as $key => $value) :
                        $resultText = ($key == array_key_last($calculateInfo['probability_n'])) ? "resultText" : ""; ?>
                        <tr>
                          <td><?= $key ?></td>
                          <td>=</td>
                          <td class="text-end <?= $resultText ?>"><?= $value; ?></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal -->
    </div>
  </div>
  <!-- Content -->

  <!-- Bootstrap JS -->
  <script src="stylesheet/bootstrap.bundle.min.js"></script>
</body>

</html>