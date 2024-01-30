<?php
require_once("../db_violin_connect.php");


$id = $_POST["editId"];
$name = trim($_POST["nameEdit"]);
$price = trim($_POST["priceEdit"]);
$num = trim($_POST["numEdit"]);
$intro = trim($_POST["introEdit"]);
$brand = trim($_POST["brandEdit"]);
$size = trim($_POST["sizeEdit"]);
$top = trim($_POST["topEdit"]);
$bas = trim($_POST["basEdit"]);
$neck = trim($_POST["neckEdit"]);
$finger = trim($_POST["fingerEdit"]);
$bow = trim($_POST["bowEdit"]);



$sql = "UPDATE product SET `name`='$name', price='$price', num='$num', introduction='$intro', brand='$brand', size='$size', top='$top', back_and_sides='$bas', neck='$neck', fingerboard='$finger', bow='$bow' WHERE product_id='$id'";

if ($conn->query($sql) === true) {
   echo "更新成功";
} else {
   echo "更新失敗 : " . $conn->error;
};


header("location: ../pages/product-list.php");


?>