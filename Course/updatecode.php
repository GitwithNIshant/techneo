<?php
include("../config.php");

if (isset($_POST['editid'])) {

     $courseId = $_POST['courseId'];
     $courseName = $_POST['courseName'];
     $courseShortCode = $_POST['courseShortCode'];
     $universityID = $_POST['universityId'];
     $query = "UPDATE tblCourse SET courseName = '$courseName', courseShortCode = '$courseShortCode', tblCourse.universityId = $universityID WHERE courseId = $courseId;";
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