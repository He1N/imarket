<?php
include 'check.php';

if (isset($_POST['submit'])) {
    $data = [
        "name" => $_POST['name'],
        "price_old" => $_POST['price_old'],
        "price_current" => $_POST['price_current'],
        "description" => $_POST['description'],
        "rating" => $_POST['rating'],
        "quantity" => $_POST['quantity'],
        "added_to_site" => $_POST['added_to_site'],
    ];

    $result = $query->insert('products', $data);

    if ($result) {
        echo "<script>alert('Product added successfully'); window.top.location.reload();</script>";
        exit;
    } else {
        echo "<script>alert('Error adding product');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
    <link rel="stylesheet" href="../src/css/bootstrap.min.css"> <!-- Asegúrate de que existe -->
</head>
<body>
    <div class="container p-4">
        <h3>Add New Product</h3>
        <form method="POST">
            <div class="form-group">
                <label>Product Name</label>
                <input name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Old Price</label>
                <input type="text" name="price_old" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Current Price</label>
                <input type="text" name="price_current" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label>Rating</label>
                <input type="number" step="0.1" name="rating" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Quantity</label>
                <input type="number" name="quantity" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Added to Site</label>
                <input type="date" name="added_to_site" class="form-control" required>
            </div>
            <button name="submit" class="btn btn-success">Save Product</button>
        </form>
    </div>
</body>
</html>
