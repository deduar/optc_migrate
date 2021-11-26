<?php

if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
  echo 'We don\'t have mysqli!!!';
} else {
  echo 'Phew we have it!';
}

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

$sql = "SELECT `ID`,`post_author`,`post_title`,`post_content` FROM `optnc_posts`WHERE `post_type`='product' AND `post_status`='publish' AND `post_author`>125";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "number of register: ".$result->num_rows;
  echo "<table><tr>
    <th>user_id</th>
    <th>post_id</th>
    <th>category</th>
    <th>brand</th>
    <th>model</th>
    <th>contado</th>
    <th>financiado</th>
    <th>numbre_dues</th>
    <th>value_dues</th>
    <th>currency</th>
    <th>taxes_inc</th>
    <th>year</th>
    <th>title</th>
    <th>version</th>
    <th>setas</th>
    <th>doors</th>
    <th>power</th>
    <th>chasis</th>
    <th>kms</th>
    <th>motor</th>
    <th>cambio</th>
    <th>descripcion</th>
    <th>waranty</th>
    <th>certificate_description</th>
    <th>warrantyDuration</th>
    <th>exchange</th>
    <th>certificate</th>
    <th>color</th>
    <th>acabado</th>
    <th>province</th>
    <th>municipality</th>
    <th>cp</th>
    <th>status</th>
    </tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $sql_category = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='tipo' AND `post_id`=".$row['ID'];
    $category = $conn->query($sql_category);
    $sql_brand = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='marca' AND `post_id`=".$row['ID'];
    $brand = $conn->query($sql_brand);
    $sql_model = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='modelo' AND `post_id`=".$row['ID'];
    $model = $conn->query($sql_model);
    $sql_contado = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='_regular_price' AND `post_id`=".$row['ID'];
    $contado = $conn->query($sql_contado);
    $sql_financiado = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='financiado' AND `post_id`=".$row['ID'];
    $financiado = $conn->query($sql_financiado);
    $sql_numberdues = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='financiado_duracion' AND `post_id`=".$row['ID'];
    $numberdues = $conn->query($sql_numberdues);
    $sql_valuedues = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='precio_financiado' AND `post_id`=".$row['ID'];
    $valuedues = $conn->query($sql_valuedues);
    $sql_taxes_inc = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='iva_incluido' AND `post_id`=".$row['ID'];
    $taxes_inc = $conn->query($sql_taxes_inc);
    $sql_year = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='ano_matriculacion' AND `post_id`=".$row['ID'];
    $year = $conn->query($sql_year);
    $sql_version = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='version' AND `post_id`=".$row['ID'];
    $version = $conn->query($sql_version);
    $sql_seat = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='plazas' AND `post_id`=".$row['ID'];
    $seat = $conn->query($sql_seat);
    $sql_door = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='puertas' AND `post_id`=".$row['ID'];
    $door = $conn->query($sql_door);
    $sql_power = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='potencia' AND `post_id`=".$row['ID'];
    $power = $conn->query($sql_power);
    $sql_kms = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='km' AND `post_id`=".$row['ID'];
    $kms = $conn->query($sql_kms);
    $sql_cambio = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='caja_cambios' AND `post_id`=".$row['ID'];
    $cambio = $conn->query($sql_cambio);
    $sql_waranty = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='garantia' AND `post_id`=".$row['ID'];
    $waranty = $conn->query($sql_waranty);
    $sql_certificate_description = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='certificadomarca_cuadro' AND `post_id`=".$row['ID'];
    $certificate_description = $conn->query($sql_certificate_description);
    $sql_warrantyDuration = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='garantia_duracion' AND `post_id`=".$row['ID'];
    $warrantyDuration = $conn->query($sql_warrantyDuration);
    $sql_exchange = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='acepta_ofertas' AND `post_id`=".$row['ID'];
    $exchange = $conn->query($sql_exchange);
    $sql_certificate = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='certificadomarca' AND `post_id`=".$row['ID'];
    $certificate = $conn->query($sql_certificate);
    $sql_color = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='color' AND `post_id`=".$row['ID'];
    $color = $conn->query($sql_color);
    $sql_acabado = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='acabado' AND `post_id`=".$row['ID'];
    $acabado = $conn->query($sql_acabado);
    $sql_province = "SELECT `meta_value` FROM `optnc_postmeta` WHERE `meta_key`='provincia' AND `post_id`=".$row['ID'];
    $province = $conn->query($sql_province);
    echo "<tr>
        <td>".$row["post_author"]."</td>
        <td>".$row["ID"]."</td>
        <td>".$category->fetch_assoc()['meta_value']."</td>
        <td>".$brand->fetch_assoc()['meta_value']."</td>
        <td>".$model->fetch_assoc()['meta_value']."</td>
        <td>".$contado->fetch_assoc()['meta_value']."</td>
        <td>".$financiado->fetch_assoc()['meta_value']."</td>
        <td>".$numberdues->fetch_assoc()['meta_value']."</td>
        <td>".$valuedues->fetch_assoc()['meta_value']."</td>
        <td></td>
        <td>".$taxes_inc->fetch_assoc()['meta_value']."</td>
        <td>".$year->fetch_assoc()['meta_value']."</td>
        <td>".$row["post_title"]."</td>
        <td>".$version->fetch_assoc()['meta_value']."</td>
        <td>".$seat->fetch_assoc()['meta_value']."</td>
        <td>".$door->fetch_assoc()['meta_value']."</td>
        <td>".$power->fetch_assoc()['meta_value']."</td>
        <td></td>
        <td>".$kms->fetch_assoc()['meta_value']."</td>
        <td></td>
        <td>".$cambio->fetch_assoc()['meta_value']."</td>
        <td>".$row["post_content"]."</td>
        <td>".$waranty->fetch_assoc()['meta_value']."</td>
        <td>".$certificate_description->fetch_assoc()['meta_value']."</td>
        <td>".$warrantyDuration->fetch_assoc()['meta_value']."</td>
        <td>".$exchange->fetch_assoc()['meta_value']."</td>
        <td>".$certificate->fetch_assoc()['meta_value']."</td>
        <td>".$color->fetch_assoc()['meta_value']."</td>
        <td>".$acabado->fetch_assoc()['meta_value']."</td>
        <td>".$province->fetch_assoc()['meta_value']."</td>
        <td></td>
        <td></td>
        <td></td>
        </tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
