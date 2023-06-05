<?php
include("../config.php");

if (isset($_POST['checking_viewbtn'])) {
     $facultyID = $_POST['facultyId'];
 
     $query = "SELECT facultyID, facultyName, facultyMobileNo, facultyEmail, collegeName FROM tblFaculty, tblCollege WHERE tblFaculty.collegeId = tblCollege.collegeId and facultyID = $facultyID;";
     $query_run = mysqli_query($connection, $query);
     // echo $query; 
     if (mysqli_num_rows($query_run) > 0) {
          foreach ($query_run as $row) {
               echo $return = '
               <h5>Faculty ID : ' . $row['facultyID'] . ' </h5>
               <h5>Faculty Name : ' . $row['facultyName'] . ' </h5>
               <h5>Faculty Mobile No : ' . $row['facultyMobileNo'] . ' </h5>
               <h5>Faculty Email : ' . $row['facultyEmail'] . ' </h5>
               <h5>College Name : ' . $row['collegeName'] . ' </h5>
             ';
          }
     } else {

          echo $return = "<h5>No Record Found</h5>";
     }
}
?>