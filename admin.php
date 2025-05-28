<!-- admin.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin - Add Product</title>
</head>

<body>
    <h1>Add a New Product</h1>
    <form action="admin_page.php" method="post" enctype="multipart/form-data">
        <label for="nom_prd">Product Name:</label><br>
        <input type="text" id="nom_prd" name="nom_prd" required><br><br>

        <label for="type_prd">Product Type:</label><br>
        <select id="type_prd" name="type_prd" required>
            <option value="Salade">Salade</option>
            <option value="Pizza">Pizza</option>
            <option value="Burger">Burger</option>
            <option value="Dessert">Dessert</option>
            <option value="Boisson">Boisson</option>
            <option value="Seafood">Seafood</option>
        </select><br><br>

        <label for="prix_prd">Price (DZD):</label><br>
        <input type="number" id="prix_prd" name="prix_prd" step="0.01" min="0" required><br><br>

        <label for="url_prd">Image URL:</label><br>
        <input type="file" id="image" name="image" accept="image/*" required> <br>

        <label for="desc_prd">Description:</label><br>
        <textarea id="desc_prd" name="desc_prd" rows="4" cols="50" required></textarea><br><br>

        <input type="submit" value="Add Product">
    </form>
</body>

</html>