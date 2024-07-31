<?php
include('./database/connect_db.php');

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

$featured = [];
$onSale = [];
$accessories = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if ($row['category'] === 'featured') {
            $featured[] = $row;
        } elseif ($row['category'] === 'on_sale') {
            $onSale[] = $row;
        } else {
            $accessories[] = $row;
        }
    }
}

$conn->close();

echo json_encode(['featured' => $featured, 'onSale' => $onSale, 'accessories' => $accessories]);
?>
