<?php

include("../config.php");

if(isset($_POST['insertdata']))
{
    //$Uid = $_POST['Uid'];
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
   

    $query = "insert into tblCollege(collegeName, collegeShortCode, universityID, DTECode, DTERegieon, District, Taluka, Pincode, CollegeEmail, CollegeContact, Poc, OfficeNumber, PersonalNumber) values('$collegeName', '$collegeShortCode', '$universityID', '$DTECode','$DTERegieon', '$District','$Taluka', '$Pincode','$CollegeEmail','$CollegeContact','$Poc','$OfficeNumber','$PersonalNumber');"; 
    // echo $query;
    $query_run = mysqli_query($connection, $query);
    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: index.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>
