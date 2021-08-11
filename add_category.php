<?php
// server connection
$servername = "localhost";
$username = "root";
// their is no password in default
$password = "";
// our database name
$dbname = "category";
  // got input from html using '$_POST[]'
   $category_name = $_POST['c_name'];
     // sql connection
     if($category_name == "" ){
         die("Please enter the feilds!");
     }
  // lets check its connected
  $conn = new mysqli($servername, $username, $password,$dbname);
  
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 
  // in php we use '.' operator for string concatenation!
  // store sql query in variable
  // we set id as auto increment so set it as empty
  $sql = "insert into category_details(category_id,category_name) values('','".$category_name."')";
  // query execution
  if ($conn->query($sql) === TRUE) {
     header("Location:list.php");
     exit();
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

?>