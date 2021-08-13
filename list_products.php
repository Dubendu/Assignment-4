<?php include('config.php')?>
<html>
<head>
    <title>List Products</title>
    <meta charset="UTF-8">
    <meta name="description" content="add category">
    <meta name="Keywords" content="add,categories">
    <meta name="author" content="Dubendu">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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
    <br>
    <div class="container">
      <form action="create_product.php" method='POST' class="list_of_products">
        <button id="create-category-btn">Create Category</button>
      </form>
    <br>
<div class="table">
    <?php

      $result = mysqli_query($conn,"SELECT * FROM product_details");
     

    echo "<table border='1' style='border-collapse:collapse;' align='center' class='table'>
    <tr>
    <th>PRODUCT NAME</th>
    <th>PRODUCT IMAGE</th>
    <th>PRODUCT PRICE</th>
    <th>PRODUCT CATEGORY</th>
    <th>Action</th>
    </tr>";

    while($row = mysqli_fetch_array($result))
    {
    echo "<tr class='product_row' height='100'>
    <td>" . $row['product_name'] . "</td>
    <td><img src=".$row['product_image']." class='product_photos'></td>
    <td>" . $row['product_price'] . "</td>
    <td>" . $row['product_category'] . "</td>
    <td> <a  href='edit_product.php?edit=".$row['product_id']."'><button class='edit-btn'>Edit</button></a> <a class='delete-btn' href='list_products.php?delete=".$row['product_id']."'><button class='delete-btn'>Delete</button></a></td>
    </tr>";
    }
    echo "</table>";   
    if(isset($_GET['delete'])){
      $id = $_GET['delete'];
      $sql = "DELETE FROM `product_details` WHERE `product_id` = $id";
      $result = mysqli_query($conn, $sql);
    }
?>
</div>
</div>
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
</body>

</html>