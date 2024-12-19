<?php
$sql = "SELECT products.id ,products.nom , products.prix , products.description FROM products ";


$result = $conn->query($sql);

$products = $result->fetch_all(MYSQLI_ASSOC);
