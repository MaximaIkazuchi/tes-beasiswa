<?php
$db = mysqli_connect("localhost", "root", "", "train_beasiswa");

// query select
function query(string $query)
{
  global $db;
  $result = mysqli_query($db, $query);
  $box = [];
  while ($queries = mysqli_fetch_assoc($result)) {
    $box[] = $queries;
  }
  return $box;
}

// query insert
function insertDataTrain($data)
{
  global $db;
  $nama = htmlspecialchars($data['nama']);
  $usia = (int)$data['usia'];
  $pekerjaan_ortu = htmlspecialchars($data['pekerjaan_ortu']);
  $status = htmlspecialchars($data['status']);
  $nilai_raport = htmlspecialchars($data['nilai_raport']);
  $terima_beasiswa = htmlspecialchars($data['terima_beasiswa']);

  $query = "INSERT INTO penerima_beasiswa VALUES ('', '$nama', '$usia', '$pekerjaan_ortu', '$status', '$nilai_raport', '$terima_beasiswa')";
  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}

// naive bayes
function naivebayes($data_test)
{
  // hitung class
  function countClass()
  {
    global $db;
    $totalClass = (int) query("SELECT COUNT(*) FROM penerima_beasiswa")[0]['COUNT(*)'];

    $query = "SELECT COUNT(*) FROM penerima_beasiswa WHERE terima_beasiswa=";
    $y = (int) mysqli_fetch_row(mysqli_query($db, $query . "'ya'"))[0];
    $n = (int) mysqli_fetch_row(mysqli_query($db, $query . "'tidak'"))[0];
    $classCounted = [
      "y" => $y,
      "n" => $n,
      "class_y" => $y / $totalClass,
      "class_n" => $n / $totalClass
    ];
    return $classCounted;
  }

  // hitung attribute
  function countAttr($data_test)
  {
    global $db;
    $column = ['pekerjaan_ortu', 'status', 'nilai_raport'];
    foreach ($column as $column_name) {
      $attrValue = $data_test["$column_name"];
      $query = "SELECT COUNT(*) FROM penerima_beasiswa WHERE $column_name='$attrValue' AND terima_beasiswa=";
      $attrCounted["{$column_name}_y"] = (int) mysqli_fetch_row(mysqli_query($db, $query . "'ya'"))[0] / countClass()['y'];
      $attrCounted["{$column_name}_n"] = (int) mysqli_fetch_row(mysqli_query($db, $query . "'tidak'"))[0] / countClass()['n'];
    }
    return $attrCounted;
  }

  // finalize
  $class = countClass();
  $attr = countAttr($data_test); 
  $probability_y["class_y"] = $class['class_y'];
  $probability_n["class_n"] = $class['class_n'];
  $column = ['pekerjaan_ortu', 'status', 'nilai_raport'];
  foreach ($column as $column_name) {
    $probability_y["$column_name"] = $attr["{$column_name}_y"];
    $probability_n["$column_name"] = $attr["{$column_name}_n"];
  }
  $resultProbability_y = array_product($probability_y);
  $resultProbability_n = array_product($probability_n);

  // untuk echo di tampilan hasil
  $probability_y['result'] = $resultProbability_y;
  $probability_n['result'] = $resultProbability_n;
  $calculateInfo = [
    "probability_y" => $probability_y,
    "probability_n" => $probability_n
  ];
  $_POST["calculateInfo"] = $calculateInfo;

  if ($resultProbability_y > $resultProbability_n) {
    return "Selamat, Anda telah lulus!";
  } else if ($resultProbability_y < $resultProbability_n) {
    return "Maaf, Anda belum lulus";
  }
}
?>