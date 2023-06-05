<?php
include("../config.php");

if (isset($_POST['checking_viewbtn'])) {
     $universityID = $_POST['universityID'];
 

     $query = "SELECT * FROM tblUniversity where universityID = '$universityID' ";
     $query_run = mysqli_query($connection, $query);

     if (mysqli_num_rows($query_run) > 0) {
          foreach ($query_run as $row) {
               echo $return = '
               <h5>University Id : ' . $row['universityID'] . ' </h5>
               <h5>University Name : ' . $row['universityName'] . ' </h5>
               <h5>University Code : ' . $row['universityShortCode'] . ' </h5>
             ';
          }
     } else {

          echo $return = "<h5>No Record Found</h5>";
     }
}
?>