<?php
 include_once'header.php';
?>
	</div>
</div>

<?php
  
    if (isset($_SESSION["usersuid"])){
        $seller = $_SESSION["usersuid"];

    }


    $msg="";
    if (isset($_POST['upload'])){
        $target = "images/".basename($_FILES['image']['name']);

        $db = mysqli_connect("localhost", "root", "", "productdb");
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $image = $_FILES['image']['name'];
        $product_description = $_POST['product_description'];


        if(empty($product_name) || empty($product_price) || empty($image) || empty($product_description)){
            header("location: ../infinitegreen/myshop.php?error=emptyinput");
            exit();
        }
        else{
            $sql = "INSERT INTO producttb (product_name, product_price, product_image, seller, product_description) VALUES ('$product_name', ' $product_price', '$image', '$seller', '$product_description')";
            mysqli_query($db, $sql);
            header("location: ../infinitegreen/myshop.php?success");
            exit();
            
        }
       
       
       
        

        
    }

?>

<div id="content">
    <form action="myshop.php" method="POST" enctype = "multipart/form-data">
        <input type="hidden" name="size" value="1000000">
        <div>
            <input type="file" name="image">
        </div>
        <div>

            <input type="text" name="product_name" placeholder="Product name">
            <input type="text" name="product_price" placeholder="Product Price">

            <textarea name="product_description" id="" cols="40" rows="4" placeholder="type"></textarea>
            
        </div>
        <div class="">
            <input type="submit" name="upload" value="upload image">
        </div>
    </form>
</div>			


<?php
	include_once'footer.php';
?>
