<?php 

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_name = $_POST['product-name'];
    $product_price = $_POST['product-price'];
    $product_description = $_POST['product-description'];


    $stmt = $conn->prepare("INSERT INTO products(nom, prix, description) VALUES (?, ?, ?)");
    $stmt->bind_param("sid", $product_name, $product_price, $product_description);
    $stmt -> execute();
    echo"safe tinserate";
}
include_once "views/home.php";
die();