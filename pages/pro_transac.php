<?php
include '../includes/connection.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);


// Check if a file is uploaded
if (isset($_FILES["fileToUpload"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a valid image
    // $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    // if ($check === false) {
    //     echo "File is not an image.";
    //     $uploadOk = 0;
    // }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 2000000) { // 2MB limit, adjust as needed
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";

            // Store the uploaded file name in a variable
            $uploadedFileName = htmlspecialchars(basename($_FILES["fileToUpload"]["name"]));

            // Perform database insertion
            $pc = $_POST['prodcode'];
            $name = $_POST['name'];
            $desc = $_POST['description'];
            $qty = $_POST['quantity'];
            $oh = "default";
            $pr = $uploadedFileName; // Store the uploaded file name
            $cat = $_POST['category'];
            $supp = $_POST['supplier'];
            $dats = $_POST['datestock'];

            $query = "INSERT INTO product
                (PRODUCT_ID, PRODUCT_CODE, NAME, DESCRIPTION, QTY_STOCK, ON_HAND, PRICE, CATEGORY_ID, SUPPLIER_ID, DATE_STOCK_IN, UPLOADNAME)
                VALUES (Null,'{$pc}','{$name}','{$desc}',1,1,'{$pr}',{$cat},{$supp},'{$dats}','{$uploadedFileName}')";

            mysqli_query($db, $query) or die('Error in updating product in Database ' . $query);

            // Redirect to the desired page
            echo '<script>window.history.back();</script>';
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

include '../includes/footer.php';
?>
