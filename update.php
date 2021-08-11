<?php include('config.php')?>
<?php
//checking if the user has clicked the edit button
if(isset($_GET["edit"])){
    $ID = $_GET["edit"];
    $query = "SELECT * FROM category_details WHERE category_id = $ID";
    $result  = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
    extract($row);
    
}

//checking if the user has submitted the form
else if(isset($_POST["submit"])){
    //checking If the user has completely filled all the form fields
    if(isset($_POST ["c_name"])){
        //get the ID of the record to modify in the database
        $ID = $_GET ["toedit"];
        $c_name = $_POST ["c_name"];

$sql = "UPDATE category_details SET category_name = '$c_name' WHERE category_id = $ID ";

if(mysqli_query($conn,$sql)){
    header("Location:list.php");
    exit();

}
else{
    $msg = "oops! There is an error when editing your record. Retry again" . mysqli_error($conn);
    }
}
else{
    header("Location:list.php");
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
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header>
        <nav>
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
    <br>
    <form method='POST' action="<?php echo $_SERVER['PHP_SELF']."?toedit=$ID";?>">
        <div class="container">
            <h1>Edit Category</h1>
            <div class="input-group">
                <input class="form-input" type="text" name="c_name">
            </div><br>
               <button name="submit">Save Changes</button>
               <button type="submit" formaction="index.html">Go Back</button>
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
            <label for="subscribe">Sign Up for QuickDeal Emails:</label><input type="text" name="subscribe" id="searchbar" placeholder="Email">
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
    <script src="validation.js"></script>
</body>

</html>