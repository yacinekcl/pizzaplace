<?php
include 'db.php';


$sql = "SELECT nom_prd, url_prd, desc_prd, prix_prd FROM `produits` WHERE type_prd = 'Dessert'";
$result = $conn->query($sql);

echo '<div class="horizontal-grid">';
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    

    echo '
       <div class="horizontal-grid">
        <div class="product-card">
          <div class="product-image">
            <img src="' . htmlspecialchars($row['url_prd']) . '" alt="' . htmlspecialchars($row["nom_prd"]) . '">
            <div class="hover-buttons">
              <button class="add-to-cart">Add to Cart</button>
            </div>
          </div>
          <div class="product-info">
            <h3>' . htmlspecialchars($row["nom_prd"]) . '</h3>
            <p>' . htmlspecialchars($row["desc_prd"]) . '</p>
            <p>' . number_format($row["prix_prd"], 2) . ' DZD</p>
          </div> 
           </div>
            
        </div>';
  }
} else {
  echo '<p>No Dessert found.</p>';
}

echo '</div>';

$conn->close();
?>