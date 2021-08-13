<?php include('config.php')?>
<?php
if (isset($_POST['submit'])){
    $product_name=$_POST['p_name'];
    $product_price=$_POST['p_price'];
    $product_category=$_POST['category'];
    $product_image=$_FILES['p_image']['name'];
    $target="./images/".$product_image;
    $target_db="images/".$product_image;
    move_uploaded_file($_FILES["p_image"]["tmp_name"],$target);
    $sql="insert into product_details(product_id,product_name,product_image,product_price,product_category) values('','".$product_name."','".$target_db."','".$product_price."','".$product_category."')";
if ($conn->query($sql)===TRUE){
    header("Location:list_products.php");
    exit();
}
else{
    echo 'Error:'.$sql."<br>".$conn->error;
}
}
?>
<html>
<head>
    <title>Category</title>
    <meta charset="UTF-8">
    <meta name="description" content="add category">
    <meta name="Keywords" content="add,categories">
    <meta name="author" content="Dubendu">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="CSS/product_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript">validateform();</script>
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
    <form method="post" class="create_product_form" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" onsubmit="return validateform()" novalidate>
        <div class="container">
            <h1>Add Product</h1>
            <div class="input-group">
                <label for="product_name">Product Name</label>
                <input class="form-input" type="text" name="p_name" placeholder="" id="product_name" onblur="validate2()">
                <span id="errorPname"></span>
                <label for="product_price">Product Price</label>
                <input class="form-input" type="text" name="p_price" placeholder="" id="product_price" onblur="validate3()">
                <span id="errorPrice"></span>
                <label for="upload_image">Upload Image</label>
                <input class="form-input" type="file" name="p_image" placeholder="" id="upload_image" onblur="validate4()">
                <span id="errorImage"></span>
                <label for="select_category">Select Category</label>
                <select name="category" id="select_category" class="form-input" onblur="validate4()">
                    <option value="Mobile">Mobile</option>
                    <option value="Automobile">Automobile</option>
                    <option value="Books">Books</option>
                    <option value="Sports">Sports</option>
                    <option value="Earphones">Earphones</option>
                </select>
                <span id="errorCategory"></span>
                <div class="create_pbtn">
                    <a href="#"><button class="btn" align="right" name="submit" type="submit">Submit</button></a> 
                    <a href="#"><button class="btn" align="right" name="reset" type="reset" id="reset_btn">Reset</button></a>
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
            <label for="subscribe" style="display:inline;">Sign Up for QuickDeal Emails:</label><input type="text" name="subscribe" id="subscribe" placeholder="Email">
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
</body>

</html>