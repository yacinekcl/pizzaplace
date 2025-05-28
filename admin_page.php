<?php
// admin_page.php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom_prd = $conn->real_escape_string($_POST['nom_prd']);
    $type_prd = $conn->real_escape_string($_POST['type_prd']);
    $prix_prd = floatval($_POST['prix_prd']);

    $desc_prd = $conn->real_escape_string($_POST['desc_prd']);



    // Dossier de destination pour les fichiers uploadés
    $uploadDir = "assets/img/produits/";
    echo isset($_FILES['image']);
    // Vérifie si un fichier a été envoyé et qu'il n'y a pas d'erreur
    if (isset($_FILES['image'])) {
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = basename($_FILES['image']['name']);
        $fileSize = $_FILES['image']['size'];
        $fileType = mime_content_type($fileTmpPath);

        // Extensions autorisées
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp', 'image/jpg'];

        if (in_array($fileType, $allowedTypes)) {
            // Sécurise le nom du fichier
            $newFileName = uniqid('img_', true) . '.' . pathinfo($fileName, PATHINFO_EXTENSION);

            // Déplace le fichier dans le dossier cible
            $destPath = $uploadDir . $newFileName;

            $url_prd = $uploadDir . $newFileName;
            if (move_uploaded_file($fileTmpPath, $destPath)) {
                echo "Fichier importé avec succès : <a href='$destPath'>$newFileName</a>";
            } else {
                echo "Erreur lors du déplacement du fichier.";
            }
        } else {
            echo "Type de fichier non autorisé. Veuillez envoyer une image (jpeg, png, gif, webp).";
        }
    } else {
        echo "Aucun fichier reçu ou une erreur est survenue lors de l'envoi.";
    }













    $sql = "INSERT INTO produits (nom_prd, type_prd, prix_prd, url_prd, desc_prd)
            VALUES ('$nom_prd', '$type_prd', $prix_prd, '$url_prd', '$desc_prd')";
    echo $sql;
    if ($conn->query($sql) === TRUE) {
        echo "New product added successfully.";

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>