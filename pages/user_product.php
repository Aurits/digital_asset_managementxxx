<?php
include '../includes/connection.php';

include '../includes/user_sidebar.php';
$query = 'SELECT ID, t.TYPE
            FROM users u
            JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = ' . $_SESSION['MEMBER_ID'] . '';
$result = mysqli_query($db, $query) or die(mysqli_error($db));

while ($row = mysqli_fetch_assoc($result)) {
  $Aa = $row['TYPE'];

  if ($Aa == 'Admin') {
?>
    <script type="text/javascript">
      //then it will be redirected
      alert("Restricted Page! You will be redirected to POS");
      window.location = "index.php";
    </script>
<?php
  }
}
$sql = "SELECT DISTINCT CNAME, CATEGORY_ID FROM category order by CNAME asc";
$result = mysqli_query($db, $sql) or die("Bad SQL: $sql");

$aaa = "<select class='form-control' name='category' required>
        <option disabled selected hidden>Select Category</option>";
while ($row = mysqli_fetch_assoc($result)) {
  $aaa .= "<option value='" . $row['CATEGORY_ID'] . "'>" . $row['CNAME'] . "</option>";
}

$aaa .= "</select>";

$sql2 = "SELECT DISTINCT SUPPLIER_ID, COMPANY_NAME FROM supplier order by COMPANY_NAME asc";
$result2 = mysqli_query($db, $sql2) or die("Bad SQL: $sql2");

$sup = "<select class='form-control' name='supplier' required>
        <option disabled selected hidden>Select Department</option>";
while ($row = mysqli_fetch_assoc($result2)) {
  $sup .= "<option value='" . $row['SUPPLIER_ID'] . "'>" . $row['COMPANY_NAME'] . "</option>";
}

$sup .= "</select>";
?>

<div class="card shadow mb-4">
  <!-- <div class="card-header py-3">
    <h4 class="m-2 font-weight-bold text-primary">Asset&nbsp;<a href="#" data-toggle="modal" data-target="#aModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
  </div> -->
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Asset Code</th>
            <th>Name</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Category</th>
            <th>Departmet</th>
            <th>Upload</th>
            <!-- <th>Action</th> -->
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
            echo '<td>' . $row['QTY_STOCK'] . '</td>';
            echo '<td>' . $row['CNAME'] . '</td>';
            echo '<td>' . $row['COMPANY_NAME'] . '</td>';
            echo '<td>' . $row['UPLOADNAME'] . '</td>';
        //     echo '<td align="right"> <div class="btn-group">
        //                       <a type="button" class="btn btn-primary bg-gradient-secondary" href="pro_searchfrm.php?action=edit & id=' . $row['PRODUCT_CODE'] . '"><i class="fas fa-fw fa-list-alt"></i> Info</a>
        //                     <div class="btn-group">
        //                       <a type="button" class="btn btn-secondary bg-gradient-secondary dropdown no-arrow" data-toggle="dropdown" style="color:#fff;">
        //                       ... <span class="caret"></span></a>
        //                     <ul class="dropdown-menu text-center" role="menu">
        //                         <li>
        //                           <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="pro_edit.php?action=edit & id=' . $row['PRODUCT_ID'] . '">
        //                             <i class="fas fa-fw fa-edit"></i> Update
        //                           </a>
        //                         </li>
								
								// <li>
        //                           <a type="button" class="btn btn-info bg-gradient-info btn-block" style="border-radius: 0px;" href="pro_edit.php?action=edit & id=' . $row['PRODUCT_ID'] . '">
        //                             <i class="fas fa-fw fa-edit"></i> Download
        //                           </a>
        //                         </li>
								
								// <li>
        //                           <a type="button" class="btn btn-danger bg-gradient-danger btn-block" style="border-radius: 0px;" href="pro_del.php?id=' . $row['PRODUCT_ID'] . '">
        //                             <i class="fas fa-fw fa-edit"></i> Delete
        //                           </a>
        //                         </li>
        //                     </ul>
        //                     </div>
        //                   </div> </td>';
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

