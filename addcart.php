<?php
 
require_once 'include/DB_Functions.php';
$db = new DB_Functions();
 
// json response array
$response = array("error" => FALSE);


if (isset($_POST['user_id']) && isset($_POST['shopproduct_id']) ) {
 
    // receiving the post params
    $user_id = $_POST['user_id'];
    $shopproduct_id = $_POST['shopproduct_id'];
    
    
    // check if user is already existed with the same email
    //if ($db->isUserExisted($user_id)) {
        // user already existed
      //  $response["error"] = TRUE;
        //$response["error_msg"] = "User already existed with " . $user_id;
        //echo json_encode($response);
    //} else {
        // create a new user
        $cart = $db->storeproduct($user_id, $shopproduct_id);
        if ($cart) {
            // user stored successfully
            $response["error"] = FALSE;
          //  $response["uid"] = $user["unique_id"];
           $response["cart"]["user_id"] = $cart["user_id"];
            $response["cart"]["shopproduct_id"] = $cart["shopproduct_id"];
            
           
            echo json_encode($response);
            
        } else {
            // user failed to store
            $response["error"] = TRUE;
            $response["error_msg"] = "Unknown error occurred !";
            echo json_encode($response);
        }
    
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters () is missing!";
    echo json_encode($response);
}
?>