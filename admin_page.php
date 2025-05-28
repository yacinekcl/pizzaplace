<?php
// admin_page.php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom_prd = $conn->real_escape_string($_POST['nom_prd']);
    $type_prd = $conn->real_escape_string($_POST['type_prd']);
    $prix_prd = floatval($_POST['prix_prd']);
    $url_prd = $conn->real_escape_string($_POST['url_prd']);
    $desc_prd = $conn->real_escape_string($_POST['desc_prd']);

    $sql = "INSERT INTO produits (nom_prd, type_prd, prix_prd, url_prd, desc_prd)
            VALUES ('$nom_prd', '$type_prd', $prix_prd, '$url_prd', '$desc_prd')";

    if ($conn->query($sql) === TRUE) {
        echo "New product added successfully.";
        header ("location: admin.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
