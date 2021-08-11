<?php
// server connection
$servername = "localhost";
$username = "root";
// their is no password in default
$password = "";
// our database name
$dbname = "category";
  // lets check its connected
$conn = new mysqli($servername, $username, $password,$dbname);
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

//Inserting the submitted data into the database
$sql = "UPDATE category_details SET category_name = '$c_name' WHERE category_id = $ID ";

if(mysqli_query($conn,$sql)){
    header("Location:list.php");
    exit();

}
else{
    $msg = "oops! There is an error when editing your record. Retry again" . mysqli_error($conn);
    }
}
//If the user did not click the edit link in index.php or the submit button in edit.php and tries to access this page, redirect the user back to index.php_ini_loaded_file
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
    <title>Category</title>
    <link rel="stylesheet" href="CSS/style.css">
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
               <button type="submit" formaction="index.html"></button>
        </div>
    </form>
    <footer>
        <p>Copyright &copy; 2021 Dubendu Singh</p>
        <a href="#">singhdubendu222@gmail.com</a>
    </footer>
    <script src="validation.js"></script>
</body>

</html>