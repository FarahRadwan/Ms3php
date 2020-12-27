<?php
 
//$result = mysql_query($sql);

//if(mysql_num_rows($result) >0){
   //found


// Create connection
$conn = new mysqli("localhost", "root", "", "android_api");

if ($conn->connect_error) {
 
 die("Connection failed: " . $conn->connect_error);
} 
if (isset($_POST['product_id'])) {
 $product_id = $_POST['product_id'];
$sql = "SELECT shop.name, shop.shop_id, shopproduct.product_id ,shopproduct.shopproduct_id,shop.latitude, shop.longitude, shopproduct.price, shopproduct.availablespecialoffers from shop, shopproduct where shopproduct.product_id=$product_id AND shop.shop_id=shopproduct.shop_id";



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