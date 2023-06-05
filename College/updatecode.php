<?php
include("../config.php");

if (isset($_POST['editid'])) {

     $id = $_POST['collegeID'];
     $collegeName = $_POST['collegeName'];
     $collegeShortCode = $_POST['collegeShortCode'];
     $universityID = $_POST['universityID'];
     $DTECode = $_POST['DTECode'];
     $DTERegieon = $_POST['DTERegieon'];
     $District = $_POST['District'];
     $Taluka = $_POST['Taluka'];
     $Pincode = $_POST['Pincode'];
     $CollegeEmail = $_POST['CollegeEmail'];
     $CollegeContact = $_POST['CollegeContact'];
     $Poc = $_POST['Poc'];
     $OfficeNumber = $_POST['OfficeNumber'];
     $PersonalNumber = $_POST['PersonalNumber'];

     $query = "UPDATE tblCollege SET collegeName = '$collegeName', collegeShortCode = '$collegeShortCode', DTECode = '$DTECode', DTERegieon = '$DTERegieon', District = '$District', Taluka = '$Taluka', Pincode = '$Pincode', CollegeEmail = '$CollegeEmail', CollegeContact = '$CollegeContact', Poc = '$Poc', OfficeNumber = '$OfficeNumber', PersonalNumber = '$PersonalNumber', tblcollege.universityID = $universityID WHERE collegeID = $id;";
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