<?php
 
//$result = mysql_query($sql);

//if(mysql_num_rows($result) >0){
   //found


// Create connection
$conn = new mysqli("localhost", "root", "", "android_api");

if ($conn->connect_error) {
 
 die("Connection failed: " . $conn->connect_error);
} 
if (isset($_POST['cart_id'])) {
 $cart_id = $_POST['cart_id'];
$sql = "DELETE 
FROM cart where cart.cart_id=$cart_id ";



$result = $conn->query($sql);



 
  $response["msg"] = "deleted successfully!";
  echo json_encode($response);
 
 }
 

?>