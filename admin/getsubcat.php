<?php
session_start();
if (isset($_SESSION['uname'])) {
    $id=$_REQUEST['id'];
    include_once("includes/config.php");
    $qry = "select * from subcategories where catid='".$id."'";
    $result=mysqli_query($conn, $qry) or exit("subcategory select fail".mysqli_error($conn));
    $output="";
    while ($row=mysqli_fetch_array($result)) {
        $output.="<option value='".$row['id']."'>".$row['subcatname']."</option>";
    }
    echo $output;
}
?>