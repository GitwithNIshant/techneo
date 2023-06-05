<?php
include("../config.php");

if (isset($_POST['checking_viewbtn'])) {
     $collegeId = $_POST['collegeId'];
 

     $query = "select collegeId, collegeName, UniversityName, collegeShortCode, DTECode, DTERegieon, District, Taluka, Pincode, CollegeEmail, CollegeContact, Poc, OfficeNumber, PersonalNumber from tblCollege, tblUniversity where tblCollege.UniversityId = tblUniversity.UniversityId and collegeId = $collegeId;";
     $query_run = mysqli_query($connection, $query);

     if (mysqli_num_rows($query_run) > 0) {
          foreach ($query_run as $row) {
               echo $return = '
               <h5>College Id : ' . $row['collegeId'] . ' </h5>
               <h5>College Name : ' . $row['collegeName'] . ' </h5>
               <h5>college ShortCode : ' . $row['collegeShortCode'] . ' </h5>
               <h5>College DTECode : ' . $row['DTECode'] . ' </h5>
               <h5>College DTERegieon : ' . $row['DTERegieon'] . ' </h5>
               <h5>College District : ' . $row['District'] . ' </h5>
               <h5>College Taluka : ' . $row['Taluka'] . ' </h5>
               <h5>College Pincode : ' . $row['Pincode'] . ' </h5>
               <h5>College CollegeEmail : ' . $row['CollegeEmail'] . ' </h5>
               <h5>College CollegeContact : ' . $row['CollegeContact'] . ' </h5>
               <h5>College Poc : ' . $row['Poc'] . ' </h5>
               <h5>College OfficeNumber : ' . $row['OfficeNumber'] . ' </h5>
               <h5>College PersonalNumber : ' . $row['PersonalNumber'] . ' </h5>
             ';
          }
     } else {

          echo $return = "<h5>No Record Found</h5>";
     }
}
?>