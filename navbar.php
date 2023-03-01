<nav class="<?= $pos ?>">
  <div class="d-flex">
    <a href="index.php" id="nav-item-1"><i class="fa-solid fa-house-chimney"></i> Home</a>
    <a href="data_train.php" id="nav-item-2"><i class="fa-solid fa-microscope"></i> Data Latih</a>
    <a href="test_beasiswa.php" id="nav-item-3"><i class="fa-solid fa-graduation-cap"></i> Test Beasiswa</a>
  </div>
  <script>
    document.querySelector("#<?= $nav_active ?>").classList.add("nav-active");
  </script>
</nav>