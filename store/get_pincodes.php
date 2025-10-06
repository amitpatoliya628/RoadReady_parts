<?php
include("config.php");

if(isset($_POST['city_id'])){
    $city_id = $_POST['city_id'];
    $query = mysqli_query($conn, "SELECT * FROM pincodes WHERE city_id='$city_id' ORDER BY pincode ASC");
    echo '<option value="">Select Pincode</option>';
    while($row = mysqli_fetch_assoc($query)){
        echo '<option value="'.$row['pincode'].'">'.$row['pincode'].'</option>';
    }
}
?>
