<?php
include_once "BasicDoc.php";

class WebshopDoc extends BasicDoc
{
  protected function showHeader()
  {
    echo "<h1>WebShop</h1>";
  }

  protected function showContent()
  {
    $this->model->products = $this->model->getWebshopData();
    // var_dump($this->model->products);

    echo "<div class=\"row\">";

    // Check if the user is an admin and display the Add Product button
    echo "<br>";
    echo "<br>";
    if ($this->model->isUserAdmin())
    {
      // var_dump(isUserAdmin());
      echo "<input type='hidden' name='action' value='add'>";
      echo "<div class='add-product-button'>";
      echo "<a href='index.php?page=add_product'>
            <button type=\"button\" class=\"btn btn-primary btn-block\"> Add New Product </button></a>";
    }

    foreach ($this->model->products as $product)
    {
      echo "<div class=\"column\">";
      echo "<br>";

      // Link to product details page
      echo "<a href='index.php?page=product_details&product_id=" . $product->id . "' style='cursor: pointer;'>";
      echo "<img src='Images/" . $product->file_name . "' alt='" . htmlspecialchars($product->name) . "' style='width: 45%;' />";
      echo "</a>";
      echo "<h3> id: " . $product->id . "</h3>";
      echo "<h3>" . $product->name . "</h3>";
      echo "<h3>Price: €" . $product->price . "</h3>";

      if ($this->model->isUserLoggedIn())
      {
        echo "<form action='index.php' method='post' onsubmit='redirectToCart()'>";
        echo "<input type='hidden' name='page' value='shoppingcart'>";
        echo "<input type='hidden' name='action' value='add'>";
        echo "<input type='hidden' name='product_id' value='" . $product->id . "'>";
        echo "<button style=\"font-size:12px\">Add to Cart <i class=\"fa fa-shopping-cart\"></i></button>";
        echo "</form>";
      }


      echo "</div>";
    }
    echo "</div>";
  }
}

?>