<?php
require_once("../db_violin_connect.php");

$id = $_GET["product_id"];

$sql="UPDATE product SET valid='0' WHERE product_id=$id ";

if($conn->query($sql)===TRUE){
   echo "刪除成功";
}else{
   echo "刪除資料錯誤: " . $conn->error; 
}

$conn->close(); 

header("location: product-list.php");

?>