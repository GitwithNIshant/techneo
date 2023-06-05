<?php
include("../config.php");

if (isset($_POST['updatedata'])) {


     $facultyID = $_POST['edit_id'];
     $facultyName = $_POST['facultyName'];
     $facultyMobileNo = $_POST['facultyMobileNo'];
     $facultyEmail    = $_POST['facultyEmail'];
     $collegeId       = $_POST['collegeId'];
     $query = "UPDATE tblFaculty SET facultyName = '$facultyName', facultyMobileNo = '$facultyMobileNo', facultyEmail = '$facultyEmail', tblFaculty.collegeId = $collegeId  WHERE facultyID= $facultyID";
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