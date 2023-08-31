<?php
include '../includes/connection.php';
?>
<!-- Page Content -->
<div class="col-lg-12">
  <?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  $pc = $_POST['prodcode'];
  $name = $_POST['name'];
  $desc = $_POST['description'];
  $qty = $_POST['quantity'];
  $oh = "default";
  $pr = "description"; // Store the uploaded file name
  $cat = $_POST['category'];
  $supp = $_POST['supplier'];
  $dats = $_POST['datestock'];

  switch ($_GET['action']) {
    case 'add':
      $query = "INSERT INTO product
                (PRODUCT_ID, PRODUCT_CODE, NAME, DESCRIPTION, QTY_STOCK, ON_HAND, PRICE, CATEGORY_ID, SUPPLIER_ID, DATE_STOCK_IN)
                VALUES (Null,'{$pc}','{$name}','{$desc}',1,1,'{$pr}',{$cat},{$supp},'{$dats}')";
      mysqli_query($db, $query) or die('Error in updating product in Database ' . $query);
      break;
  }
  ?>
  <script type="text/javascript">
    window.location = "product.php";
  </script>
</div>

<?php
include '../includes/footer.php';
?>
<?php
include '../includes/connection.php';
?>
<!-- Page Content -->
<div class="col-lg-12">
  <?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  // Get the uploaded file name
  $file = $_POST['file'];
  $uploadedFileName = $_FILES[$file]['name']; // Assuming the input name is 'file'

  $pc = $_POST['prodcode'];
  $name = $_POST['name'];
  $desc = $_POST['description'];
  $qty = $_POST['quantity'];
  $oh = "default";
  $pr = mysqli_real_escape_string($db, $uploadedFileName); // Store the uploaded file name
  $cat = $_POST['category'];
  $supp = $_POST['supplier'];
  $dats = $_POST['datestock'];

  switch ($_GET['action']) {
    case 'add':
      $query = "INSERT INTO product
                (PRODUCT_ID, PRODUCT_CODE, NAME, DESCRIPTION, QTY_STOCK, ON_HAND, PRICE, CATEGORY_ID, SUPPLIER_ID, DATE_STOCK_IN)
                VALUES (Null,'{$pc}','{$name}','{$desc}','{$qty}','{$qty}','{$pr}',{$cat},{$supp},'{$dats}')";
      mysqli_query($db, $query) or die('Error in updating product in Database ' . $query);
      break;
  }
  ?>
  <script type="text/javascript">
    window.location = "product.php";
  </script>
</div>

<?php
include '../includes/footer.php';
?>
