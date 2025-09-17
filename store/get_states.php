<?php
include("config.php");

if(isset($_POST['country_id'])){
    $country_id = $_POST['country_id'];
    $query = mysqli_query($conn, "SELECT * FROM states WHERE country_id='$country_id' ORDER BY name ASC");
    echo '<option value="">Select State</option>';
    while($row = mysqli_fetch_assoc($query)){
        echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
    }
}
?>
