<?php include('config.php')?>
<?php
//checking if the user has clicked the edit button
if(isset($_GET["edit"])){
    $ID = $_GET["edit"];
    $query = "SELECT * FROM product_details WHERE product_id = $ID";
    $result  = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
    extract($row);
    
}

//checking if the user has submitted the form
else if(isset($_POST["submit"])){
    //checking If the user has completely filled all the form fields
    if(isset($_POST ["p_name"],$_POST["p_price"],$_POST["p_image"],$_POST["category"])){
        //get the ID of the record to modify in the database
        $ID = $_GET ["toedit"];
        $product_name = $_POST ["p_name"];
        $product_price=$_POST['p_price'];
        $product_category=$_POST['category'];
        $product_image=$_POST['p_image'];
       // $target="images/".$product_image;

$sql = "UPDATE product_details SET product_name = '$product_name',product_image='$product_image',product_price='$product_price',product_category='$product_category' WHERE product_id = $ID ";

if(mysqli_query($conn,$sql)){
    header("Location:list_products.php");
    exit();

}
else{
    $msg = "oops! There is an error when editing your record. Retry again" . mysqli_error($conn);
    echo $msg;
    }
}
else{
    header("Location:list_products.php");
    exit();
}
}
?>
<html>
<head>
     <meta charset="utf-8">
    <meta name="description" content="add category">
    <meta name="Keywords" content="add,categories">
    <meta name="author" content="Dubendu">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Update Category</title>
    <link rel="stylesheet" href="CSS/product_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header>
        <nav>
            <img src="images/logo.png">
            <div id="div1">
            <a href="home">Home</a>
            <a href="menu">Menu</a>
            <a href="about">About Us</a>
            <a href="contact">Contact</a>
            <a href="login">Login</a>
            <a href="register">Register</a>
            </div>
            <div id="div2">
                <input type="text" id="searchbar" name="searchbar" placeholder="Search">
            </div>
        </nav>
    </header>
    <br>
    <form method='POST' id="regForm" class="create_product_form" action="<?php echo $_SERVER['PHP_SELF']."?toedit=$ID";?>" onsubmit="return validateform()">
        <div class="container">
            <h1>Edit Category</h1>
            <div class="input-group">
            <label for="product_name">Product Name</label>
                <input class="form-input" type="text" name="p_name"  id="product_name">
                <span id="errorPname"></span>
                <label for="product_price">Product Price</label>
                <input class="form-input" type="text" name="p_price" id="product_price">
                <span id="errorPrice"></span>
                <label for="upload_image">Upload Image</label>
                <input class="form-input" type="file" name="p_image" placeholder="" id="upload_image">
                <span id="errorImage"></span>
                <label for="select_category">Select Category</label>
                <select name="category" id="select_category" class="form-input">
                    <option value="Mobile">Mobile</option>
                    <option value="Automobile">Automobile</option>
                    <option value="Book">Books</option>
                    <option value="Sports">Sports</option>
                    <option value="Earphones">Earphones</option>
                </select> 
                <span id="errorCategory"></span>  
               <div>               
                   <button type="submit" name="submit" id="save-change-btn" class="update-btn">Save Changes</button>
                    <button type="submit" formaction="create_product.php" id="go-back-btn" class="update-btn">Go Back</button>
                </div>
            </div>
        </div>
    </form>
    <footer>
    <div class="grid-container">
            <div class="grid-item">
                <h3>Site Links</h3>
                <ul>
                    <li>About QuickDeal</li>
                    <li>Careers</li>
                    <li>QuickDeal Global Sites</li>
                    <li>Sitemap</li>
                    <li>Affiliates</li>
                    <li>Contact</li>
                </ul>
            </div>
            <div class="grid-item">
                <h3>My QuickDeal</h3>
                <ul>
                    <li>My Account</li>
                    <li>Order Status</li>
                    <li>My Vouchers</li>
                    <li>Offers</li>
                    <li>Rewards</li>
                </ul>
            </div>
            <div class="grid-item">
                <h3>Help & FAQs</h3>
                <ul>
                    <li>Online Ordering</li>
                    <li>Shipping</li>
                    <li>Billing</li>
                    <li>Returns & Exchanges</li>
                    <li>Customer Service</li>
                </ul>
            </div>
        </div>
        <div class="social-links">
            <label for="subscribe">Sign Up for QuickDeal Emails:</label><input type="text" name="subscribe" id="subscribe" placeholder="Email">
            <a href="#" class="fa fa-facebook"></a>
            <a href="#" class="fa fa-twitter"></a>
            <a href="#" class="fa fa-google"></a>
            <a href="#" class="fa fa-youtube"></a>
            <a href="#" class="fa fa-instagram"></a>
            <a href="#" class="fa fa-linkedin"></a>
            <a href="#" class="fa fa-pinterest"></a>
            <a href="#" class="fa fa-snapchat-ghost"></a>
            <a href="#" class="fa fa-skype"></a>
        </div>
        <div>
            <p>Copyright &copy; 2021 Dubendu Singh</p>
            <a href="#">singhdubendu222@gmail.com</a>
        </div>
    </footer>
    <script src="product_validation.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

</html>