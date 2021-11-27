<?php

try {
  //connect to DB
  // database connexion setting
  $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname     = "oportunicar";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  //select posts
  $sql = "SELECT `ID`,`post_author`,`post_title`,`post_content` FROM `optnc_posts`WHERE `post_type`='product' AND `post_status`='publish' AND `post_author`>125 LIMIT 10";
  $result = $conn->query($sql);

  //open fleetdata files **** ToDo ****

  //foreach post -> csv
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $sql_category = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='tipo' AND `post_id`=" . $row['ID'];
      $category = $conn->query($sql_category);
      $sql_brand = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='marca' AND `post_id`=" . $row['ID'];
      $brand = $conn->query($sql_brand);
      $sql_model = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='modelo' AND `post_id`=" . $row['ID'];
      $model = $conn->query($sql_model);
      $sql_contado = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='_regular_price' AND `post_id`=" . $row['ID'];
      $contado = $conn->query($sql_contado);
      $sql_financiado = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='financiado' AND `post_id`=" . $row['ID'];
      $financiado = $conn->query($sql_financiado);
      $sql_numberdues = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='financiado_duracion' AND `post_id`=" . $row['ID'];
      $numberdues = $conn->query($sql_numberdues);
      $sql_valuedues = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='precio_financiado' AND `post_id`=" . $row['ID'];
      $valuedues = $conn->query($sql_valuedues);
      $sql_taxes_inc = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='iva_incluido' AND `post_id`=" . $row['ID'];
      $taxes_inc = $conn->query($sql_taxes_inc);
      $sql_year = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='ano_matriculacion' AND `post_id`=" . $row['ID'];
      $year = $conn->query($sql_year);
      $sql_version = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='version' AND `post_id`=" . $row['ID'];
      $version = $conn->query($sql_version);
      $sql_seat = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='plazas' AND `post_id`=" . $row['ID'];
      $seat = $conn->query($sql_seat);
      $sql_door = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='puertas' AND `post_id`=" . $row['ID'];
      $door = $conn->query($sql_door);
      $sql_power = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='potencia' AND `post_id`=" . $row['ID'];
      $power = $conn->query($sql_power);
      $sql_kms = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='km' AND `post_id`=" . $row['ID'];
      $kms = $conn->query($sql_kms);
      $sql_cambio = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='caja_cambios' AND `post_id`=" . $row['ID'];
      $cambio = $conn->query($sql_cambio);
      $sql_waranty = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='garantia' AND `post_id`=" . $row['ID'];
      $waranty = $conn->query($sql_waranty);
      $sql_certificate_description = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='certificadomarca_cuadro' AND `post_id`=" . $row['ID'];
      $certificate_description = $conn->query($sql_certificate_description);
      $sql_warrantyDuration = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='garantia_duracion' AND `post_id`=" . $row['ID'];
      $warrantyDuration = $conn->query($sql_warrantyDuration);
      $sql_exchange = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='acepta_ofertas' AND `post_id`=" . $row['ID'];
      $exchange = $conn->query($sql_exchange);
      $sql_certificate = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='certificadomarca' AND `post_id`=" . $row['ID'];
      $certificate = $conn->query($sql_certificate);
      $sql_color = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='color' AND `post_id`=" . $row['ID'];
      $color = $conn->query($sql_color);
      $sql_acabado = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='acabado' AND `post_id`=" . $row['ID'];
      $acabado = $conn->query($sql_acabado);
      $sql_province = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='provincia' AND `post_id`=" . $row['ID'];
      $province = $conn->query($sql_province);

      echo $row["post_author"]."|".$row["ID"]."|".$category->fetch_assoc()['meta_value']."|".$brand->fetch_assoc()['meta_value']."|".$model->fetch_assoc()['meta_value']."|".$contado->fetch_assoc()['meta_value']."|".$financiado->fetch_assoc()['meta_value']."|".$numberdues->fetch_assoc()['meta_value']."|".$valuedues->fetch_assoc()['meta_value']."|"."|".$taxes_inc->fetch_assoc()['meta_value']."|".$year->fetch_assoc()['meta_value']."|".$row["post_title"]."|".$version->fetch_assoc()['meta_value']."|".$seat->fetch_assoc()['meta_value']."|".$door->fetch_assoc()['meta_value']."|".$power->fetch_assoc()['meta_value']."|"."|".$kms->fetch_assoc()['meta_value']."|"."|".$cambio->fetch_assoc()['meta_value']."|".$row["post_content"]."|".$waranty->fetch_assoc()['meta_value']."|".$certificate_description->fetch_assoc()['meta_value']."|".$warrantyDuration->fetch_assoc()['meta_value']."|".$exchange->fetch_assoc()['meta_value']."|".$certificate->fetch_assoc()['meta_value']."|".$color->fetch_assoc()['meta_value']."|".$acabado->fetch_assoc()['meta_value']."|".$province->fetch_assoc()['meta_value']."|"."|"."|"."|"."|"."|".PHP_EOL;

    }
  }
  $conn->close();

} catch (Exception $e) {
  echo $e->getMessage();
}

