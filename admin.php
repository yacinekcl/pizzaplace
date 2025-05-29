<!-- admin.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    
<link href="https://cdn.jsdelivr.net/npm/pagedone@1.2.2/src/css/pagedone.css " rel="stylesheet"/>
</head>

<body>
       <div class="tabs">
<div class="block">
<ul class="flex border-b border-gray-200 space-x-3 transition-all duration-300 -mb-px">
 <li>
   <a href="javascript:void(0)" class="inline-block py-4 px-6 text-gray-500 hover:text-gray-800 font-medium border-b-2 border-transparent tab-active:border-b-indigo-600 tab-active:text-indigo-600 active tablink whitespace-nowrap" data-tab="tabs-with-underline-1" role="tab"> Add Product </a>
 </li>
 <li>
   <a href="javascript:void(0)" class="inline-block py-4 px-6 text-gray-500 hover:text-gray-800 font-medium border-b-2 border-transparent tab-active:border-b-indigo-600 tab-active:text-indigo-600 tablink whitespace-nowrap" data-tab="tabs-with-underline-2" role="tab"> Remove Product </a>
 </li>
 <li>
   <a href="javascript:void(0)" class="inline-block py-4 px-6 text-gray-500 hover:text-gray-800 font-medium border-b-2 border-transparent tab-active:border-b-indigo-600 tab-active:text-indigo-600 tablink whitespace-nowrap" data-tab="tabs-with-underline-3" role="tab"> Tab 3 </a>
 </li>
</ul>
</div>
<div class="mt-3">
  
<div id="tabs-with-underline-1" role="tabpanel" aria-labelledby="tabs-with-underline-item-1" class="tabcontent">
 <div>
      <h1>Add a New Product</h1>
    <form class="addproductform" action="admin_page.php" method="post" enctype="multipart/form-data">
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

        <input id="addproductbtn" type="submit" value="Add Product">
    </form>
    </div>
</div>

<div id="tabs-with-underline-2" class="hidden tabcontent" role="tabpanel" aria-labelledby="tabs-with-underline-item-2">
 <?php
include 'db.php';

$typeLabels = [
    "Salade" => "🥗 Salads",
    "Pizza" => "🍕 Pizzas",
    "Burger" => "🍔 Burgers",
    "Dessert" => "🍰 Desserts",
    "Boisson" => "🥤 Drinks",
    "Seafood" => "🦐 Seafood"
];

// Fetch all products grouped by type
$productsByType = [];
$result = $conn->query("SELECT * FROM produits ORDER BY type_prd, nom_prd");
while ($row = $result->fetch_assoc()) {
    $productsByType[$row['type_prd']][] = $row;
}
?>

<div class="product-list space-y-6">
    <?php foreach ($typeLabels as $dbType => $label): ?>
        <?php if (!empty($productsByType[$dbType])): ?>
            <div>
                <h2 class="text-2xl font-bold text-indigo-700 mb-4"><?php echo $label; ?></h2>
                <?php foreach ($productsByType[$dbType] as $product): ?>
                    <div class="product-item border p-4 mb-3 rounded shadow-sm flex justify-between items-center bg-white">
                        <div>
                            <h3 class="text-lg font-semibold"><?php echo htmlspecialchars($product['nom_prd']); ?></h3>
                            <p class="text-sm text-gray-600"><?php echo number_format($product['prix_prd'], 2); ?> DZD</p>
                            <p class="text-sm"><?php echo htmlspecialchars($product['desc_prd']); ?></p>
                        </div>
                        <form action="delete_product.php" method="post">
                            <input type="hidden" name="num_prd" value="<?php echo $product['num_prd']; ?>">
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded">
                                Remove
                            </button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>

<?php $conn->close(); ?>


</div>

<div id="tabs-with-underline-3" class="hidden tabcontent" role="tabpanel" aria-labelledby="tabs-with-underline-item-3">
 <p class="text-gray-500 dark:text-gray-400"> This is the <em class="font-semibold text-gray-800 dark:text-gray-200">third</em> item's tab body. </p>
</div>

</div>
</div>
    

    

<script src="https://cdn.jsdelivr.net/npm/pagedone@1.2.2/src/js/pagedone.js"></script>
          
</body>

</html>