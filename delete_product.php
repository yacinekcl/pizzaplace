<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['num_prd'])) {
    $num_prd = intval($_POST['num_prd']);

    // First delete from child table
    $conn->query("DELETE FROM ingredientsproduits WHERE num_prd = $num_prd");

    // Then delete from produits
    $stmt = $conn->prepare("DELETE FROM produits WHERE num_prd = ?");
    $stmt->bind_param("i", $num_prd);

    if ($stmt->execute()) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Failed to delete product: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
