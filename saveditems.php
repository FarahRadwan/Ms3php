<?php
 
//$result = mysql_query($sql);

//if(mysql_num_rows($result) >0){
   //found


// Create connection
$conn = new mysqli("localhost", "root", "", "android_api");

if ($conn->connect_error) {
 
 die("Connection failed: " . $conn->connect_error);
} 
if (isset($_POST['user_id'])) {
 $user_id = $_POST['user_id'];
$sql = "SELECT DISTINCT  cart.shopproduct_id, cart.cart_id,shop.name,product.productname,cart.user_id FROM shopproduct INNER JOIN cart ON cart.shopproduct_id=shopproduct.shopproduct_id and cart.user_id=$user_id INNER JOIN shop On shopproduct.shop_id=shop.shop_id INNER Join product on shopproduct.product_id=product.product_id ";



$result = $conn->query($sql);


if ($result->num_rows >0) {
 
 
 while($row[] = $result->fetch_assoc()) {
 
 $tem = $row;
 
 $json = json_encode($tem);
 
 
 }
 }
 else {
 echo "No Results Found.";
}
 echo $json;
$conn->close();

} else {
    // required post params is missing
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters email or password is missing!";
    echo json_encode($response);
}

?>