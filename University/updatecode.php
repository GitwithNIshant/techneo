<?php
include("../config.php");

if (isset($_POST['updatedata'])) {

     $edit_id = $_POST['edit_id'];

     $universityName = $_POST['universityName'];
     $universityShortCode = $_POST['universityShortCode'];
     $query = "UPDATE tblUniversity SET universityName = '$universityName', universityShortCode = '$universityShortCode' WHERE UniversityId= $edit_id";
     // echo $query;
     $query_run = mysqli_query($connection, $query);
     if ($query_run) {
          echo '<script> alert("Data Updated"); </script>';
          header("Location:index.php");
     } else {
          echo '<script> alert("Data Not Updated"); </script>';
     }

}
?>