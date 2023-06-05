<?php

include("../config.php");

if (isset($_POST['checking_viewbtn'])) {
     $courseId = $_POST['courseId'];
 
     $query = "SELECT courseId, courseName, courseShortCode, universityName FROM tblcourse, tbluniversity WHERE tblcourse.universityID = tblUniversity.universityID and courseId = $courseId;";
     // echo $query;
     $query_run = mysqli_query($connection, $query);

     if (mysqli_num_rows($query_run) > 0) {
          foreach ($query_run as $row) {
               echo $return = '    
               <h5>Course Id : ' . $row['courseId'] . ' </h5>
               <h5>Course Name : ' . $row['courseName'] . ' </h5>
               <h5>Course Short Code : ' . $row['courseShortCode'] . ' </h5>
               <h5>University Name : ' . $row['universityName'] . ' </h5>
             ';
          }
     } else {

          echo $return = "<h5>No Record Found</h5>";
     }
}
?>