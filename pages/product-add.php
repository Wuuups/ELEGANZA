<?php
require_once("../db_violin_connect.php");


$id = $_POST["addId"];
$name = trim($_POST["nameAdd"]);
$price = trim($_POST["priceAdd"]);
$num = trim($_POST["numAdd"]);
$intro = trim($_POST["introAdd"]);
$brand = trim($_POST["brandAdd"]);
$size = trim($_POST["sizeAdd"]);
$top = trim($_POST["topAdd"]);
$bas = trim($_POST["basAdd"]);
$neck = trim($_POST["neckAdd"]);
$finger = trim($_POST["fingerAdd"]);
$bow = trim($_POST["bowAdd"]);



$sql = "INSERT INTO product (product_category_id, name, price, num, introduction , brand, size, top, back_and_sides ,neck, fingerboard, bow, valid)
VALUES ('$id','$name', '$price', '$num','$intro', '$brand', '$size', '$top','$bas', '$neck', '$finger', '$bow', 1)";


if ($conn->query($sql) === true) {
   // echo "更新成功";
} else {
   echo "更新失敗 : " . $conn->error;
};


header("location: ../pages/product-list.php");
