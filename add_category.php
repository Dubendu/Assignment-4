<?php include('config.php')?>
<?php

  $category_name = $_POST['c_name'];
    // sql connection
    if($category_name == "" ){
        die("Please enter the feilds!");
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