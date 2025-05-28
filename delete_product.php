<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    // First get the image path to delete it
    $stmt = $conn->prepare("SELECT url_prd FROM produits WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($url);
    $stmt->fetch();
    $stmt->close();

    if (!empty($url) && file_exists($url)) {
        unlink($url); // delete the image file
    }

    // Now delete the product from DB
    $stmt = $conn->prepare("DELETE FROM produits WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        header("Location: admin.php");
        exit;
    } else {
        echo "Error deleting product.";
    }

    $stmt->close();
}
$conn->close();
?>
