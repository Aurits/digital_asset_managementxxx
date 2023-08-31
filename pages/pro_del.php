<?php

include'../includes/connection.php';
 error_reporting(E_ALL);
            ini_set('display_errors', 1);

             var_dump($_GET['id']);

	if (isset($_GET['id']) || $_GET['id'] != 1) {

        var_dump($_GET['id']);
						
    	// switch ($_GET['type']) {
    	// 	case 'product':
    			$query = 'DELETE FROM product WHERE PRODUCT_ID = ' . $_GET['id'];
    			$result = mysqli_query($db, $query) or die(mysqli_error($db));				
            ?>
    			<script type="text/javascript">alert("Asset Successfully Deleted.");window.location = "product.php";</script>					
            <?php
    			//break;
            // }
	}
?>