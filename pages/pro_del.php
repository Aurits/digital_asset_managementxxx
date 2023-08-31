<?php
include '../includes/connection.php';

// Display errors for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];


    var_dump($id);
    // Perform the deletion
    $query = "DELETE FROM product WHERE PRODUCT_ID = $id";
    $result = mysqli_query($db, $query) or die(mysqli_error($db));

    // Redirect after deletion
?>
    <script type="text/javascript">
        alert("Asset Successfully Deleted.");
        window.location = "product.php";
    </script>
<?php
}
?>