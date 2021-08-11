<html>
<head>
    <title>Category</title>
    <meta charset="UTF-8">
    <meta name="description" content="add category">
    <meta name="Keywords" content="add,categories">
    <meta name="author" content="Dubendu">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
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
    <div>
      <form action="index.html" method='POST' class="create-category-form">
        <button id="create-category-btn">Create Category</button>
      </form>
    </div>
    <br>
<div class="table">
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
  
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 
  
      $result = mysqli_query($conn,"SELECT * FROM category_details");

    echo "<table border='1' style='border-collapse:collapse;' align='center' class='table'>
    <tr>
    <th>Category ID</th>
    <th>Category Name</th>
    <th>Action</th>
    </tr>";

    while($row = mysqli_fetch_array($result))
    {
    echo "<tr>
    <td>" . $row['category_id'] . "</td>
    <td>" . $row['category_name'] . "</td>
    <td> <a  href='update.php?edit=".$row['category_id']."'><button class='edit-btn'>Edit</button></a> <a class='delete-btn' href='list.php?delete=".$row['category_id']."'><button class='delete-btn'>Delete</button></a></td>
    </tr>";
    }
    echo "</table>";   
    if(isset($_GET['delete'])){
      $id = $_GET['delete'];
      $sql = "DELETE FROM `category_details` WHERE `category_id` = $id";
      $result = mysqli_query($conn, $sql);
    }
?>
</div>
    <footer>
        <p>Copyright &copy; 2021 Dubendu Singh</p>
        <a href="#">singhdubendu222@gmail.com</a>
    </footer>
</body>

</html>