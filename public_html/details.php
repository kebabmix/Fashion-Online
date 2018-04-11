<?php
require "incl/init.php";
require DOCROOT . "/incl/header.php";

$product = new product();
$id = (int)$_GET['id'];
$product->getProduct($id);
echo "<div class=\"\">";
echo "<h2>" . $product->title . "</h2><br>";
echo "<img class=\"col-md-4\" src=\"content/img/products/". $product->thumbnail ."\" />";
echo "</div>";

require DOCROOT . "/incl/footer.php";