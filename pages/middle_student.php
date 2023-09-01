<?php
include '../includes/connection.php';

include '../includes/sidebar.php';
$query = 'SELECT ID, t.TYPE
            FROM users u
            JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = ' . $_SESSION['MEMBER_ID'] . '';
$result = mysqli_query($db, $query) or die(mysqli_error($db));

while ($row = mysqli_fetch_assoc($result)) {
  $Aa = $row['TYPE'];

  if ($Aa == 'User') {
?>
    <script type="text/javascript">
      //then it will be redirected
      alert("Restricted Page! You will be redirected to POS");
      window.location = "pos.php";
    </script>
<?php
  }
}
?>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h4 class="m-2 font-weight-bold text-primary">Digital Assets</h4>
  </div>
  <div class="card-body">
    <div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th>Asset Code</th>
      <th>Name</th>
      <th>Description</th>
      <th>Category</th>
      <th>Department</th>
      <th>Upload</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>

          <?php
          error_reporting(E_ALL);
          ini_set('display_errors', 1);

          $query = 'SELECT product.PRODUCT_ID, product.UPLOADNAME
    , product.CATEGORY_ID, product.PRODUCT_CODE, product.NAME, product.PRICE, category.CNAME, supplier.COMPANY_NAME, product.QTY_STOCK, product.DATE_STOCK_IN, product.DESCRIPTION, product.ON_HAND, product.SUPPLIER_ID
              FROM product
              JOIN category ON product.CATEGORY_ID = category.CATEGORY_ID
              JOIN supplier on product.SUPPLIER_ID = supplier.SUPPLIER_ID
              GROUP BY PRODUCT_CODE';
          $result = mysqli_query($db, $query) or die(mysqli_error($db));

          while ($row = mysqli_fetch_assoc($result)) {

            echo '<tr>';
            echo '<td>' . $row['PRODUCT_ID'] . '</td>';
            echo '<td>' . $row['NAME'] . '</td>';
            echo '<td>' . $row['DESCRIPTION'] . '</td>';
            // echo '<td>' . $row['QTY_STOCK'] . '</td>';
            echo '<td>' . $row['CNAME'] . '</td>';
            echo '<td>' . $row['COMPANY_NAME'] . '</td>';
            echo '<td>' . $row['UPLOADNAME'] . '</td>';
      echo '<td align="right">
            <a type="button" class="btn btn-primary bg-gradient-primary" href="inv_searchfrm.php?action=edit&id=' . $row['PRODUCT_CODE'] . '"><i class="fas fa-fw fa-th-list"></i> Details</a>
        </div> </td>';
      echo '</tr> ';
    }
    ?>
  </tbody>
</table>

    </div>
  </div>
</div>

<?php
include '../includes/footer.php';
?>